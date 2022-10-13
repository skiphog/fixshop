<?php

namespace Database\Seeders;

use JsonException;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Product::truncate();
        Product::flushEventListeners();

        try {
            $products = json_decode(
                file_get_contents(
                    base_path('database/data/products.json')
                ), true, 512, JSON_THROW_ON_ERROR
            );
        } catch (JsonException) {
            $products = [];
        }

        foreach (array_chunk($products, 1000) as $chunk) {
            DB::table('products')->insert($chunk);
        }
    }
}
