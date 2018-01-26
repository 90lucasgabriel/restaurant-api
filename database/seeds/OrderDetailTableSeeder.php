<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Diningtable;
use App\Models\OrderDetailStatus;
use App\Models\OrderDetailType;

/**
 * Class OrderDetailTableSeeder
 */
class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        OrderDetail::truncate();
        $order_ids        = Order::pluck('id');
        $menu_ids         = Menu::pluck('id');
        $product_ids      = Product::pluck('id');
        $diningtable_ids  = Diningtable::pluck('id');
        $order_detail_status_ids = OrderDetailStatus::pluck('id');
        $order_detail_type_ids   = OrderDetailType::pluck('id');

        for($i=0; $i<500; $i++){
            factory(OrderDetail::class)->create([
                'order_id'        => $order_ids->random(),
                'menu_id'         => $menu_ids->random(),
                'product_id'      => $product_ids->random(),
                'diningtable_id'  => $diningtable_ids->random(),
                'order_detail_status_id' => $order_detail_status_ids->random(),
                'order_detail_type_id'   => $order_detail_type_ids->random()
            ]);
        }
    }
}