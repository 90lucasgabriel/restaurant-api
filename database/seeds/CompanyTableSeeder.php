<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

/**
 * Class CompanyTableSeeder
 */
class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        factory(Company::class, 25)->create();

        /*
        factory(Company::class, 10)->create()->each(
            function($e){
                //Create 3 branches for each company
                for($i=0; $i<3; $i++){

                    //return product created
                    $b = $e->branches()->save(
                      factory(Branch::class)->make()
                    );

                    
                }
            }
        );
        */
    }
}