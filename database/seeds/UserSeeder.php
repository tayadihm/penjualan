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
            'name'      => 'marketing',
            'email'     => 'marketing@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        $marketing->assignRole('marketing');

        $user = User::create([
            'name'      => 'user',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
