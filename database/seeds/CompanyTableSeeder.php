<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Branch;
use App\Models\BranchImage;
use App\Models\BranchJob;
use App\Models\BranchJobEmployee;
use App\Models\BranchUserFavorite;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE categories CASCADE');
        Company::truncate();
        factory(Company::class, 10)->create()->each(
            function($e){
                //Create 3 branches for each company
                for($i=0; $i<3; $i++){

                    //return product created
                    $b = $e->branches()->save(
                      factory(Branch::class)->make()
                    );

                    //Create 4 images url for each product
                    for($j=0; $j<4; $j++){
                      $b->branchImages()->save(factory(BranchImage::class)->make());
                    }


                    for($j=0; $j<rand(20,30); $j++){
                      $bj = factory(BranchJob::class)->create(['branch_id'=>$b->id]);
                      for($k=0; $k<rand(20,40); $k++){
                        factory(BranchJobEmployee::class)->create(['branch_job_id'=>$bj->id]);
                      }
                    }

             
                    for($j=0; $j<rand(1,15); $j++){
                      factory(BranchUserFavorite::class)->create(['branch_id'=>$b->id]);
                    }
                    
                }
            }
        );


    }
}