<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
        	['cod' => '0001', 'name' => 'Miguel', 'city' => 'Barranquilla'],
        	['cod' => '0002', 'name' => 'Karla', 'city' => 'Barranquilla'],
        	['cod' => '0003', 'name' => 'Jhon', 'city' => 'Bogota'],
        	['cod' => '0004', 'name' => 'Carlos', 'city' => 'Medellin'],
        	['cod' => '0005', 'name' => 'Diana', 'city' => 'Cali'],
        	['cod' => '0006', 'name' => 'Francisco', 'city' => 'Bucaramanga'],
            ['cod' => '0007', 'name' => 'Luis', 'city' => 'Barranquilla'],
            ['cod' => '0008', 'name' => 'Pedro', 'city' => 'Barranquilla'],
            ['cod' => '0009', 'name' => 'Daniel', 'city' => 'Bucaramanga'],
            ['cod' => '0010', 'name' => 'Adriana', 'city' => 'Barranquilla'],
            ['cod' => '0011', 'name' => 'Andrea', 'city' => 'Cali'],
            ['cod' => '0012', 'name' => 'Liliana', 'city' => 'Cartagena']
        ]);
    }
}
