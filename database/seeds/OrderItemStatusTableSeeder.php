<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItemStatus;

/**
 * Class OrderItemStatusTableSeeder
 */
class OrderItemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        OrderItemStatus::truncate();

        factory(OrderItemStatus::class)->create([
            'id'          => 1,
            'name'        => 'Aberto',
            'description' => 'Pedido solicitado pelo cliente.'
        ]);
        factory(OrderItemStatus::class)->create([
            'id'          => 2,
            'name'        => 'Preparação',
            'description' => 'O pedido está sendo preparado.'
        ]);
        factory(OrderItemStatus::class)->create([
            'id'          => 3,
            'name'        => 'Preparado',
            'description' => 'O prato foi finalizado, mas não foi entregue.'
        ]);
        factory(OrderItemStatus::class)->create([
            'id'          => 4,
            'name'        => 'Entregando',
            'description' => 'O pedido está a caminho do cliente.'
        ]);
        factory(OrderItemStatus::class)->create([
            'id'          => 5,
            'name'        => 'Concluído',
            'description' => 'O pedido foi entregue ao cliente.'
        ]);
    }
}