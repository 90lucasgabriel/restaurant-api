<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UserTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        //$this->call(CouponTableSeeder::class);
        $this->call(DiningtableTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderItemStatusTableSeeder::class);
        $this->call(OrderItemTypeTableSeeder::class);
        $this->call(OrderItemTableSeeder::class);
        $this->call(OauthClientTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
