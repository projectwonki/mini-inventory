<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = array(
            0 => array(
                'name' => 'Supplier 1',
            ),
            1 => array(
                'name' => 'Supplier 2',
            ),
            2 => array(
                'name' => 'Supplier 3',
            ),
        );

        foreach ($suppliers as $key => $value) {
            Supplier::create([
                'name' => $value['name']
            ]);
        }
    }
}
