<?php

use App\Models\HistoryStatus;
use Illuminate\Database\Seeder;

class HistoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistoryStatus::create([
            'status'=> 'create work plan'
        ]);

        HistoryStatus::create([
            'status'=> 'accept work plan'
        ]);

        HistoryStatus::create([
            'status'=> 'pending work plan'
        ]);

        HistoryStatus::create([
            'status'=> 'decline work plan'
        ]);
    }
}
