<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetailType;

/**
 * Class OrderDetailTypeTableSeeder
 */
class OrderDetailTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetailType::truncate();

        factory(OrderDetailType::class)->create([
            'id'          => 1,
            'name'        => 'Rodízio',
            'description' => 'Refeição à vontade. O valor do pedido é cobrado por pessoa.'
        ]);
        factory(OrderDetailType::class)->create([
            'id'          => 2,
            'name'        => 'A la carte',
            'description' => 'Refeição cobrada por quantidade pedida.'
        ]);
    }
}