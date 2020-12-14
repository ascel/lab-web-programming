<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Handphone'
        ]);
        DB::table('categories')->insert([
            'name' => 'Laptop'
        ]);
        DB::table('categories')->insert([
            'name' => 'Clothes'
        ]);
    }
}
