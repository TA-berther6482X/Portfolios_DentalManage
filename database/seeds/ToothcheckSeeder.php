<?php

use Illuminate\Database\Seeder;
use App\Models\ToothCheck;
class ToothcheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        factory(ToothCheck::class, 200)->create();
    }
}
