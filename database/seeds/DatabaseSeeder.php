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
            UnitTargetSeeder::class,
            RoleSeeder::class,
            UnitSeeder::class,
            ParamSeeder::class,
            KroSeeder::class,
            HistoryStatusSeeder::class,
            UserSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class
        ]);
    }
}
