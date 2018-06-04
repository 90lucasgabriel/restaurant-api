<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItemType;

/**
 * Class OrderItemTypeTableSeeder
 */
class OrderItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItemType::truncate();

        factory(OrderItemType::class)->create([
            'id'          => 1,
            'name'        => 'Rodízio',
            'description' => 'Refeição à vontade. O valor do pedido é cobrado por pessoa.'
        ]);
        factory(OrderItemType::class)->create([
            'id'          => 2,
            'name'        => 'A la carte',
            'description' => 'Refeição cobrada por quantidade pedida.'
        ]);
    }
}