<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Marketing' ,
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Direktur',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Keuangan',
            'guard_name' => 'web'
        ]);
    }
}
