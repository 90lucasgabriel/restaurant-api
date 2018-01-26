<?php

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

/**
 * Class OrderStatusTableSeeder
 */
class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        OrderStatus::truncate();

        factory(OrderStatus::class)->create([
            'id'          => 1,
            'name'        => 'Aberto',
            'description' => 'Mesa aberta à novos pedidos.'
        ]);        
        factory(OrderStatus::class)->create([
            'id'          => 2,
            'name'        => 'Pagamento Pendente',
            'description' => 'O pedido foi concluído, mas não foi pago.'
        ]);
        factory(OrderStatus::class)->create([
            'id'          => 3,
            'name'        => 'Pago',
            'description' => 'O pedido foi concluído e pago.'
        ]);
    }
}