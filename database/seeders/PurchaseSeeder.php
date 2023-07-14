<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchases = array(
            0 => array(
                'qty' => 1,
                'date' => '2023-01-01 13:00:00',
                'product_id' => 1,
                'supplier_id' => 1,
            ),
            1 => array(
                'qty' => 2,
                'date' => '2023-01-01 14:00:00',
                'product_id' => 2,
                'supplier_id' => 2,
            ),
            2 => array(
                'qty' => 3,
                'date' => '2023-01-01 15:00:00',
                'product_id' => 3,
                'supplier_id' => 3,
            ),
        );

        foreach ($purchases as $key => $value) {
            Purchase::create([
                'qty' => $value['qty'],
                'date' => $value['date'],
                'product_id' => $value['product_id'],
                'supplier_id' => $value['supplier_id']
            ]);
        }
    }
}
