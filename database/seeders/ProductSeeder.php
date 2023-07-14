<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            0 => array(
                'name' => 'Product 1',
                'qty' => 100,
            ),
            1 => array(
                'name' => 'Product 2',
                'qty' => 200,
            ),
            2 => array(
                'name' => 'Product 3',
                'qty' => 300,
            ),
        );

        foreach ($products as $key => $value) {
            Product::create([
                'name' => $value['name'],
                'qty' => $value['qty']
            ]);
        }
    }
}
