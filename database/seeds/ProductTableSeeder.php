<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Company;
use App\Models\Category;

/**
 * Class ProductTableSeeder
 */
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $company_ids  = Company::pluck('id');
        $category_ids = Category::pluck('id');

        for($i=0; $i<240; $i++){
            factory(Product::class)->create([
                'company_id'        => $company_ids->random(),
                'category_id'       => $category_ids->random()
            ]);
        }
    }
}