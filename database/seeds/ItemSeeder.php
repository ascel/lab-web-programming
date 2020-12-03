<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            'name' => 'Iphone 11 Pro Max 256GB',
            'price' => 24000000,
            'imageUrl' => 'src/images/iphone.jpg',
            'category_id' => 1,
            'description' => 'Featuring a Stunning Pro Display, A13 Bionic, Cutting-Edge Pro Camera System and Longest Battery Life Ever in iPhone with iPhone 11 Pro Max'
        ]);
        DB::table('items')->insert([
            'name' => 'Iphone 11 Pro Max 256GB',
            'price' => 2400000,
            'imageUrl' => 'src/images/iphone.jpg',
            'category_id' => 1,
            'description' => 'Featuring a Stunning Pro Display, A13 Bionic, Cutting-Edge Pro Camera System and Longest Battery Life Ever in iPhone with iPhone 11 Pro Max'
        ]);
        DB::table('items')->insert([
            'name' => 'Iphone 11 Pro Max 256GB',
            'price' => 2400000000,
            'imageUrl' => 'src/images/iphone.jpg',
            'category_id' => 1,
            'description' => 'Featuring a Stunning Pro Display, A13 Bionic, Cutting-Edge Pro Camera System and Longest Battery Life Ever in iPhone with iPhone 11 Pro Max'
        ]);
        DB::table('items')->insert([
            'name' => 'Iphone 11 Pro Max 256GB',
            'price' => 24000000000000,
            'imageUrl' => 'src/images/iphone.jpg',
            'category_id' => 1,
            'description' => 'Featuring a Stunning Pro Display, A13 Bionic, Cutting-Edge Pro Camera System and Longest Battery Life Ever in iPhone with iPhone 11 Pro Max'
        ]);
    }
}
