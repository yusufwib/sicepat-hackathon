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
                'address' => 'Jl. Tanggul, RT.7/RW.11, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1606542',
                'lng' => '106.7469884',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Kenzi Nugroho',
                'resi' => '00224049041'  . $i,
                'address' => 'Jl. Kembangan Baru, RT.10/RW.6, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1605926',
                'lng' => '106.7467264',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Kevin Lee',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Cemp. I No.39, RW.11, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1609683',
                'lng' => '106.7469906',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Dodit Malang',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Cemp. 4 No.80, RT.3/RW.11, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1611221',
                'lng' => '106.7468971',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Mila Klaten',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Cempaka Raya No.6, RT.11/RW.11, Rawa Buaya, Cengkareng, West Jakarta City, Jakarta 11740',
                'lat' => '-6.1615179',
                'lng' => '106.7464062',
                'status' => 'inactive'
            ]);

            Order::insert([
                'receiver_phone' => '+6281334958665',
                'receiver_name' => 'Agus PDAM',
                'resi' => '00224049041' . $i,
                'address' => 'Jl. Klingkit timur rt.006/012 no.26, RT.6/RW.12, Rw. Buaya, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11740',
                'lat' => '-6.1620572',
                'lng' => '106.7469614',
                'status' => 'inactive'
            ]);
        }

    }
}
