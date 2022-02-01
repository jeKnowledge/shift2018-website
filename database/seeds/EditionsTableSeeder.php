<?php

use Illuminate\Database\Seeder;
use App\Edition;
use Carbon\Carbon;

class EditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edition = Edition::create(['year' => Carbon::now()->year, 'active' => true]);
    }
}
