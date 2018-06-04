<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Diningtable;
use App\Models\OrderItemStatus;
use App\Models\OrderItemType;

/**
 * Class OrderItemTableSeeder
 */
class OrderItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        OrderItem::truncate();
        $order_ids        = Order::pluck('id');
        $menu_ids         = Menu::pluck('id');
        $product_ids      = Product::pluck('id');
        $diningtable_ids  = Diningtable::pluck('id');
        $order_item_status_ids = OrderItemStatus::pluck('id');
        $order_item_type_ids   = OrderItemType::pluck('id');

        for($i=0; $i<500; $i++){
            factory(OrderItem::class)->create([
                'order_id'        => $order_ids->random(),
                'menu_id'         => $menu_ids->random(),
                'product_id'      => $product_ids->random(),
                'diningtable_id'  => $diningtable_ids->random(),
                'order_item_status_id' => $order_item_status_ids->random(),
                'order_item_type_id'   => $order_item_type_ids->random()
            ]);
        }
    }
}