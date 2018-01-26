<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Diningtable;
use App\Models\OrderStatus;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        Order::truncate();
        $company_ids      = Company::pluck('id');
        $branch_ids       = Branch::pluck('id');
        $diningtable_ids  = Diningtable::pluck('id');
        $order_status_ids = OrderStatus::pluck('id');

        for($i=0; $i<200; $i++){
            factory(Order::class)->create([
                'company_id'            => $company_ids->random(),
                'branch_id'             => $branch_ids->random(),
                'diningtable_id'        => $diningtable_ids->random(),
                'order_status_id'       => $order_status_ids->random(),
            ]);
        }
    }
}