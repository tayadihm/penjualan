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
            'kd_akun' => '113', 
            'nama_transaksi' => 'Piutang Usaha'
        ]);

        $setting = Setting::create([ 
            'id_setting' => '2', 
            'kd_akun' => '111', 
            'nama_transaksi' => 'Kas' 
        ]);
    }
}
