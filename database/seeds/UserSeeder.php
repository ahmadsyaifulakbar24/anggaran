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
        $asdep = User::create([
            'username' => 'asdep',
            'name' => 'Asdep',
            'parent_id' => 2,
            'unit_id' => 1,
            'password' => Hash::make('12345678'),
        ]);
        $asdep->assignRole('asdep');
    }
}
