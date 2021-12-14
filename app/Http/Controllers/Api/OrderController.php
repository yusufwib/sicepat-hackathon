<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Carbon, DB;
use App\Helper\ResponseHelper as JsonHelper;

// use Validator, Carbon, DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    function distance($lat1, $lon1, $lat2, $lon2) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return ($miles * 1.609344);
    }
    private function sendWhatsappNotificationConfirm(string $recipient, string $resi, string $courier_name)
    {
        $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";
        $header = array(
            'Content-Type:application/json',
            'API-key: 797ddd68908bae79b19e0909e2520a142d4961b2cc5ed1981a6aab29f593d8d8'
        );
        $data = json_encode(array(
            'phone' => $recipient,
            'messageType' => 'text',
            'body' => "===PAKET SEDANG MENUJU RUMAHMU===\n\nYth $recipient,\nPaketmu dengan No. resi $resi sedang dikirim ke alamat pengiriman oleh $courier_name. Pastikan anda bersedia untuk menerima paket dari kurir.\nTerima Kasih"
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close ($ch);

    }

    public function getListOrder (Request $request) {
        $res = new JsonHelper;
        $data = Order::select('orders.*', 'users.name as courier_name')
        ->leftJoin('users', 'orders.id_user', '=', 'users.id')
        ->  get();
        foreach ($data as $k => $v) {
            $cLat = $request->input('courier_lat');
            $cLng = $request->input('courier_lng');

            $distanceBetween = $this->distance($v->lat, $v->lng, $v->lat, $v->lng);
            $data[$k]->distance = substr((string)$distanceBetween, 0, 3);
        }
        $dataArr = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data), true );

        usort($dataArr, function($a, $b) {
            return strcmp($a['distance'], $b['distance']);
        });
        return $res->responseGet(true, 200, $dataArr, '');
    }

    public function getListCourier (Request $request) {
        $res = new JsonHelper;
        $data = User::get();

        return $res->responseGet(true, 200, $data, '');
    }

    public function getListOrderByCourier (Request $request) {
        $res = new JsonHelper;
        $data = Order::where('id_user', auth()->user()->id)->get();

        foreach ($data as $k => $v) {
            $cLat = $request->input('courier_lat');
            $cLng = $request->input('courier_lng');

            $distanceBetween = $this->distance($cLat, $cLng, $v->lat, $v->lng);
            $data[$k]->distance = substr((string)$distanceBetween, 0, 3);
        }

        $dataArr = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data), true );

        usort($dataArr, function($a, $b) {
            return strcmp($a['distance'], $b['distance']);
        });

        return $res->responseGet(true, 200, $dataArr, '');
    }

    public function assignCourier(Request $request) {
        $res = new JsonHelper;

        $listCourier =  $request->input('list-courier');
        // $listCourierArr = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $listCourier), true );

        $listPackage = Order::where('status', 'inactive')->get();

        $explodeCourier = (explode(",",$listCourier));
        // return $explodeCourier;
        $countPackagePerCourier = count($listPackage) / count($explodeCourier);
        $iterate = 0;

        foreach($explodeCourier as $k => $v) {
            $listPackage = Order::where('status', 'inactive')->get();
            for ($i = 0; $i < floor($countPackagePerCourier); $i++) {
                Order::where('id', $listPackage[$i]->id)->update([
                    'status' => 'process',
                    'id_user' => $v
                ]);

                $nameCourier = User::where('id', $v)->first();
                // $iterate++;
                $this->sendWhatsappNotificationConfirm($listPackage[$i]->receiver_name, $listPackage[$i]->resi, $nameCourier->name);
            }
        }

        $listPackage = Order::where('status', 'inactive')->get();

        foreach ($listPackage as $k => $v) {
            Order::where('id', $listPackage[$i]->id)->update([
                'status' => 'process',
                'id_user' => $explodeCourier[0]
            ]);
        }

        return $res->responseGet(true, 200, true, '');
    }

    public function updateCoordinate(Request $request) {
        $res = new JsonHelper;

        $idOrder =  $request->input('id_order');
        Order::where('id', $idOrder)->update([
            'lat' => $request->input('courier_lat'),
            'lng' => $request->input('courier_lng')
        ]);

        return $res->responseGet(true, 200, true, '');
    }


    public function updateToDone(Request $request) {
        $res = new JsonHelper;

        $image = $request->file('received_image');

        $paymentImage = 'received_image-' . uniqid() . $res->generateRandomString(30) . '.'.$image->getClientOriginalExtension();
        Storage::disk('public')->put($paymentImage,File::get($image));

        $idOrder =  $request->input('id_order');
        Order::where('id', $idOrder)->update([
            'status' => 'done',
            'received_date' => Carbon\Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon\Carbon::now('Asia/Jakarta'),
            'received_image' => '/storage/' . $paymentImage,
        ]);

        return $res->responseGet(true, 200, true, '');
    }


}
