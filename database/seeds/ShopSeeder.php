<?php

use Illuminate\Database\Seeder;
use \App\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
           'name' => 'CompuTienda',
           'address' => 'Calle Caracas #123',
           'phone' => '+51 985125456'
        ]);

        factory(Shop::class, 50)->create();
    }
}
