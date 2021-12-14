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

        for ($i=0; $i < 3; $i++) {

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Yusuf Wibisono',
                'resi' => '00224049041' . $i,
            'address' => 'Gang Mawar 3 No.32B RW.11 Rt.07, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1611191',
                'lng' => '106.747075',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Agus Susanto',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Kacang Panjang V No.3, RT.8/RW.7, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.16360932882379',
                'lng' => '106.74284460197445',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Kenzi Nugroho',
                'resi' => '00224049041'  . $i,
                'address' => 'Jl. Basmol Raya No.161, RT.8/RW.4, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610',
                'lat' => '-6.163248600973038',
                'lng' => '106.75060469073325',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Kevin Lee',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Kp. Salo No.3C, RT.8/RW.4, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610',
                'lat' => '-6.162680570336961',
                'lng' => '106.75276665985642',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Dodit Malang',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Taman Kota No.33, RT.11/RW.5, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610',
                'lat' => '-6.15982079279637',
                'lng' => '106.7536373708936',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Mila Klaten',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Perumahan Taman Kota Blok E6 No.34, RT:013 RW:005 Kel, RT.13/RW.5, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610',
                'lat' => '-6.1612164206430355',
                'lng' => '106.7547184310191',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Agus PDAM',
                'resi' => '00224049041' . $i,
                'address' => 'Jl Green Gdn Residence No.8, RT.3/RW.4, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11520',
                'lat' => '-6.162579224134279',
                'lng' => '106.75592638045728',
                'status' => 'inactive'
            ]);
        }

    }
}
