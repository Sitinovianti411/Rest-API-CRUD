<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [

            [
                'name' => 'silverqueen',
                'price' => '10000',
                'type' => 'makanan',
                'expired_at' => '2020-01-01'
            ],
            
            [
                'name' => 'nescafe',
                'price' => '5000',
                'type' => 'minuman',
                'expired_at' => '2020-01-01'
            ],
            

        ];

        foreach($products as $products) {
            Product::create([
                'name' => $products['name'],
                'price' => $products['price'],
                'type' => $products['type'],
                'expired_at' => $products['expired_at']
            ]);
        }
    }
}
