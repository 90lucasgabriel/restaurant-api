<?php

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Company;

/**
 * Class BranchTableSeeder
 */
class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();
        $company_ids = Company::pluck('id');

        for($i=0; $i<30; $i++){
            factory(Branch::class)->create([
                'company_id'       => $company_ids->random()
            ]);
        }
    }
}