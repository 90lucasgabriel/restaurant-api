<?php

use Illuminate\Database\Seeder;
use App\Models\Diningtable;
use App\Models\Branch;

/**
 * Class DiningtableTableSeeder
 */
class DiningtableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diningtable::truncate();
        $branch_ids = Branch::pluck('id');

        for($i=0; $i<300; $i++){
            factory(Diningtable::class)->create([
                'branch_id'         => $branch_ids->random()
            ]);
        }
    }
}