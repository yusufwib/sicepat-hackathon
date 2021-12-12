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

        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
        Order::insert([
            'receiver_phone' => '+6281334958665',
            'receiver_name' => 'Yusuf Wibisono',
            'resi' => 'JP111100022222',
            'street' => 'Jl Tanjung Putra Yudha III',
            'street_no' => '11',
            'district' => 'Kec. Tanjungrejo',
            'city' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'rt' => '001',
            'rw' => '004',
            'postal_code' => '65164',
            'lat' => '3',
            'lng' => '2',
            'status' => 'inactive'
        ]);
    }
}
