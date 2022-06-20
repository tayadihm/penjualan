<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([ 
            'id_setting' => '1', 
            'kd_akun' => '500', 
            'nama_transaksi' => 'Pembayaran'
        ]);

        $setting = Setting::create([ 
            'id_setting' => '2', 
            'kd_akun' => '101', 
            'nama_transaksi' => 'Kas' 
        ]);
    }
}
