<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($a = 0; $a<20; $a++)
        {
            $product = new Product();

            $product->kategori = "A".$a;
            $product->name_product = "product".$a;
            $product->stock = "stock".$a;
            $product->price = "price".$a;
            $product->image = "image".$a;
            $product->user_id = 1;
            $product->save();
        }
    }
}
