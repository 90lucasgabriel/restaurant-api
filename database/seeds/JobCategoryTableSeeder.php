<?php

use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use App\Models\Job;

class JobCategoryTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE categories CASCADE');
        JobCategory::truncate();
        factory(JobCategory::class)->create([
            'name'           => 'Masculino'
        ])->each(
            function($c){
                //Create 5 jobs for each category
                for($i=0; $i<10; $i++){

                    //return product created
                    $p = $c->jobs()->save(
                        factory(Job::class)->make()
                    );

                    //Create 4 images url for each product
                    //for($j=0; $j<4; $j++){
                    //  $p->productImage()->save(factory(ServiceImage::class)->make());
                    //}
                }
            }
        );

        factory(JobCategory::class)->create([
            'name'           => 'Feminino'
        ])->each(
            function($c){
                //Create 5 jobs for each category
                for($i=0; $i<10; $i++){
                    $p = $c->jobs()->save(
                        factory(Job::class)->make()
                    );
                }
            }
        );

    }
}