<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Carbon, DB;
use App\Helper\ResponseHelper as JsonHelper;


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

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
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
            $data[$k]->distance = round($distanceBetween, 3);
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
            $data[$k]->distance = $distanceBetween;
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
                $iterate++;
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


}
