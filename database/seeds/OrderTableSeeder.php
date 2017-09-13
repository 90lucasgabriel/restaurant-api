<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 10)->create()->each(function($o){
            for($i=0; $i<2; $i++){
                $o->items()->save(factory(OrderItem::class)->make([
                	'service_id' => rand(1,5),
                	'quantity' => 2,
                	'price' => 50
            	]));
            }
        });
    }
}