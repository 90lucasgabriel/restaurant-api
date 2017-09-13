<?php

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponTableSeeder extends Seeder
{
    public function run()
    {
        factory(Coupon::class, 10)->create();
    }
}