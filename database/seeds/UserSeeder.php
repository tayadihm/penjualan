<?php
use\App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marketing = User::create([
            'name'      => 'Marketing',
            'email'     => 'marketing@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        $marketing->assignRole('Marketing');

        $direktur = User::create([
            'name'      => 'Direktur',
            'email'     => 'direktur@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        $keuangan = User::create([
            'name'      => 'Keuangan',
            'email'     => 'keuangan@gmail.com',
            'password'  => bcrypt('password'),
        ]);

    }
}
