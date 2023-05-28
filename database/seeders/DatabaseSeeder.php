<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Transport;
use App\Models\TypeTransport;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'username' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'username' => 'Atasan1',
                'password' => Hash::make('password'),
                'role' => 'boss'
            ],
            [
                'username' => 'Atasan2',
                'password' => Hash::make('password'),
                'role' => 'boss'
            ],
            [
                'username' => 'Penyewa',
                'password' => Hash::make('password'),
                'role' => 'tenant'
            ],
            [
                'username' => 'Driver 1',
                'password' => Hash::make('password'),
                'role' => 'driver'
            ],
            [
                'username' => 'Driver 2',
                'password' => Hash::make('password'),
                'role' => 'driver'
            ],
        ]);

        TypeTransport::insert([
            [
                'name' => 'Angkutan Barang',
            ],
            [
                'name' => 'Angkutan Orang',
            ],
        ]);

        Transport::insert([
            [
                'name' => 'Truk Mitsubishi 2016',
                'number_series' => 'N1234NO',
                'bbm_consume' => '10000000',
                'service_schedule' => '2022-05-28',
                'type_transport_id' => 1,
            ],
            [
                'name' => 'Mobil Avanza 2019',
                'number_series' => 'N5678OK',
                'bbm_consume' => '5000000',
                'service_schedule' => '2022-06-28',
                'type_transport_id' => 2
            ],
            [
                'name' => 'Mobil Inova 2020',
                'number_series' => 'N9012OK',
                'bbm_consume' => '4000000',
                'service_schedule' => '2022-07-28',
                'type_transport_id' => 2,
            ],
            [
                'name' => 'Mobil Xenia 2020',
                'number_series' => 'N2012OK',
                'bbm_consume' => '4000000',
                'service_schedule' => '2022-07-28',
                'type_transport_id' => 2,
            ],
            [
                'name' => 'Bus Tayo 2018',
                'number_series' => 'L1234NO',
                'bbm_consume' => '4000000',
                'service_schedule' => '2022-07-28',
                'type_transport_id' => 2,
            ],
            [
                'name' => 'Truk Tacibai 2018',
                'number_series' => 'S1234NO',
                'bbm_consume' => '10000000',
                'service_schedule' => '2022-05-28',
                'type_transport_id' => 1,
            ],
            [
                'name' => 'Pikep Honda 2020',
                'number_series' => 'AG7644OK',
                'bbm_consume' => '1000000',
                'service_schedule' => '2022-05-28',
                'type_transport_id' => 1,
            ],
        ]);
    }
}
