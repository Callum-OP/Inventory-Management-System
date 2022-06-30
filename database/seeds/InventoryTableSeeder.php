<?php

use Illuminate\Database\Seeder;
use App\Inventory;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventory::class, 20)->create();  // create 20 fake products
    }
}