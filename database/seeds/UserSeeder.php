<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'unit_id' => null,
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'username' => 'deputi',
            'name' => 'Deputi',
            'unit_id' => 1,
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('deputi');

        $admin = User::create([
            'username' => 'asdep',
            'name' => 'Asdep',
            'unit_id' => 1,
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('asdep');
    }
}
