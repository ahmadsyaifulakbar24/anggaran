<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UnitSeeder::class,
            ParamSeeder::class,
            HistoryStatusSeeder::class,
            UserSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class
        ]);
    }
}
