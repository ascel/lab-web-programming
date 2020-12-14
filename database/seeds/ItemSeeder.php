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
            'name' => 'Apple MacBook Pro - 13.3" - M1 - 8 GB RAM - 256 GB SSD - US',
            'price' => 18432245,
            'imageUrl' => 'src/images/macbook.jpg',
            'category_id' => 2,
            'description' => 'Inside the $1,299 MacBook Pro I was sent is 8GB of memory and 256GB of storage. You can bump up the memory to 16GB, with storage topping out at 2TB. Some professionals will understandably be frustrated with the memory cap of 16GB, and it\'s unclear why that\'s where Apple has chosen to draw the line with its M1 processor\'s memory support. However, Apple is keeping Intel MacBook Pro models around, for the time being at least, with the option to add more memory. A fully loaded MacBook Pro with an M1, 16GB of memory and 2TB of storage prices out at $2,299.'
        ]);
        DB::table('items')->insert([
            'name' => 'Acer Aspire 3 A315-42-R0XU Ryzen 3-3200U/15.6"/4GB/1TB/Win 10/Black',
            'price' => 5000000,
            'imageUrl' => 'src/images/acerlaptop.jpg',
            'category_id' => 2,
            'description' => 'Specifications : Operating System : Windows 10 Home, Processor : AMD Ryzen 3 3200U 2.60 GHz Dual-core (2 Core™), Display : 15.6" LED ComfyView HD (1366 x 768), Graphics : AMD Radeon™ Vega 3 Mobile Graphics, Memory : 4GB, HDD : 1TB'
        ]);
        DB::table('items')->insert([
            'name' => 'UNIQLO ORI SALE TSHIRT KAOS PRIA WANITA DEWASA MANGA UT DEMON SLAYER',
            'price' => 209900,
            'imageUrl' => 'src/images/uniqlo1.jpg',
            'category_id' => 3,
            'description' => 'BRAND UNIQLO MANGA UT DEMON SLAYER ORIGINAL ASLI 100%. TSHIRT PRIA WANITA UNISEX DAN COUPLE. READY STOCK SEMUA GAMBAR YG KAMI UPLOAD. READY S, M, L, XL. BIG SALE NOW IDR 209.900. GARANSI TERMURAH.'
        ]);
        DB::table('items')->insert([
            'name' => 'Uniqlo Parka JW anderson original',
            'price' => 349000,
            'imageUrl' => 'src/images/uniqlo2.jpg',
            'category_id' => 3,
            'description' => '100% original Uniqlo Brand New with tag Uniqlo pocketable parka Warna orange. Size : M Uniqlo field parka Warna biru navy.'
        ]);
    }
}
