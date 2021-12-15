<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Pablo Escobar',
            'email' => 'kurir-1@sicepat.com',
            'password' => bcrypt('password123'), //password123
            'phone' => '+6281334958665'
        ]);

        User::insert([
            'name' => 'Imanuel Wanggai',
            'password' => bcrypt('password123'), //password123
            'email' => 'kurir-2@sicepat.com',
            'phone' => '+6281334958665'
        ]);

        User::insert([
            'name' => 'Sunarto',
            'password' => bcrypt('password123'), //password123
            'email' => 'kurir-3@sicepat.com',
            'phone' => '+6281334958665'
        ]);

        for ($i=0; $i < 1; $i++) {

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Yusuf Wibisono',
                'resi' => '00224049041' . $i,
            'address' => 'Jl. Raya Duri Kosambi No.09, RW.1, Duri Kosambi, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11750',
                'lat' => '-6.164711029198638',
                'lng' => '106.72373489209119',
                'status' => 'inactive'
            ]);

            Order::insert([
               'receiver_phone' => '+6285790905725',
                'receiver_name' => 'Agus Susanto',
                'resi' => '00224049041' . $i . 1,
                'address' => '8, RW.7, Rawa Buaya, Cengkareng, West Jakarta City, Jakarta',
                'lat' => '-6.16360932882379',
                'lng' => '106.74284460197445',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Kenzi Nugroho',
                'resi' => '00224049041'  . $i . 2,
                'address' => 'Jalan Utan Jati No.109 RT.09, kel, RT.3/RW.11, Pegadungan, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11840',
                'lat' => '-6.146700719981047',
                'lng' => '106.71357295564368',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Kevin Lee',
                'resi' => '00224049041' . $i . 3,
                'address' => 'Jl. Ruko Mutiara Palem Raya No.6, RW.14, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730',
                'lat' => '-6.137036400151968',
                'lng' => '106.73555366600293',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Dodit Malang',
                'resi' => '00224049041' . $i . 4,
                'address' => 'Jalan Jelambar, Jl. Kemanggisan, Jl. Jelambar Utama III No.16C, RT.4/RW.8, Jelambar, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11460',
                'lat' => '-6.151422994248313',
                'lng' => '106.78205557083328',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Mila Klaten',
                'resi' => '00224049041' . $i . 5,
                'address' => 'AKR Tower, Jl. Perjuangan No.5, RT.11/RW.10, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530',
                'lat' => '-6.188730745045583',
                'lng' => '106.76804084102365',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Agus PDAM',
                'resi' => '00224049041' . $i . 6,
                'address' => 'Jl Green Gdn Residence No.8, RT.3/RW.4, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11520',
                'lat' => '-6.162579224134279',
                'lng' => '106.75592638045728',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665X',
                'receiver_name' => 'Jiohan Sebastian',
                 'resi' => '00224049041' . $i . 7,
               'address' => 'Jl. Hanoman II No. 20, Bojong Indah, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, Jakarta, 11740',
                'status' => 'inactive'
            ]);


    //         Order::insert([
    //             'receiver_phone' => '+6281334958665',
    //             'receiver_name' => 'Andik Suharto',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Bojong Raya No.1, RT.10/RW.1, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1615468',
    //             'lng' => '106.7332261',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6285790905725',
    //             'receiver_name' => 'Andres Kartono',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Bojong Indah Raya No.17, RT.6/RW.04, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1608947',
    //             'lng' => '106.7469884',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Caroline',
    //              'resi' => '00224049041' . $i,
    //            'address' => '8, Jl. Belimbing Raya No.10, RW.5, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1609926',
    //             'lng' => '106.7374519',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Dicky Kurniawan',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Pagar Silver, Jl. Belimbing Raya No.55, RW.6, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1619922',
    //             'lng' => '106.7378156',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Gunawan Jusuf',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Manggis Raya No.54, RT.1/RW.8, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1638457',
    //             'lng' => '106.7373954',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Indra Gunawan',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Jagung Raya No.6, RT.13/RW.8, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
    //             'lat' => '-6.1653552',
    //             'lng' => '106.7373837',
    //             'status' => 'inactive'
    //         ]);

    // Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Jiohan Sebastian',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Hanoman I No. 29, Bojong Indah, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, Jakarta, 11740',
    //             'lat' => '-6.1665572',
    //             'lng' => '106.7371267',
    //             'status' => 'inactive'
    //         ]);

    //         Order::insert([
    //             'receiver_phone' => '+6281334958665X',
    //             'receiver_name' => 'Jiohan Sebastian',
    //              'resi' => '00224049041' . $i,
    //            'address' => 'Jl. Hanoman II No. 20, Bojong Indah, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, RT.2/RW.9, Rawa Buaya, Cengkareng, Jakarta, 11740',

    //             'status' => 'inactive'
    //         ]);

        }

    }
}
