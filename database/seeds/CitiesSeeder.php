<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	['cod' => '01', 'name' => 'Bogota'],
        	['cod' => '02', 'name' => 'Barranquilla'],
        	['cod' => '03', 'name' => 'Cartagena'],
        	['cod' => '04', 'name' => 'Medellin'],
        	['cod' => '05', 'name' => 'Pereira'],
        	['cod' => '06', 'name' => 'Bucaramanga'],
        	['cod' => '07', 'name' => 'Cali']
        ]);
    }
}
