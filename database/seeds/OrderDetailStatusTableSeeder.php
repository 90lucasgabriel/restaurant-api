<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetailStatus;

/**
 * Class OrderDetailStatusTableSeeder
 */
class OrderDetailStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        OrderDetailStatus::truncate();

        factory(OrderDetailStatus::class)->create([
            'id'          => 1,
            'name'        => 'Aberto',
            'description' => 'Pedido solicitado pelo cliente.'
        ]);
        factory(OrderDetailStatus::class)->create([
            'id'          => 2,
            'name'        => 'Preparação',
            'description' => 'O pedido está sendo preparado.'
        ]);
        factory(OrderDetailStatus::class)->create([
            'id'          => 3,
            'name'        => 'Preparado',
            'description' => 'O prato foi finalizado, mas não foi entregue.'
        ]);
        factory(OrderDetailStatus::class)->create([
            'id'          => 4,
            'name'        => 'Entregando',
            'description' => 'O pedido está a caminho do cliente.'
        ]);
        factory(OrderDetailStatus::class)->create([
            'id'          => 5,
            'name'        => 'Concluído',
            'description' => 'O pedido foi entregue ao cliente.'
        ]);
    }
}