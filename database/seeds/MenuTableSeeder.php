<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Company;

/**
 * Class MenuTableSeeder
 */
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        $company_ids = Company::pluck('id');

        factory(Menu::class)->create([
            'id'                => '1',
            'company_id'        => '1',
            'name'              => 'Almoço',
            'description'       => 'Cardápio de almoço.',
            'price_person'      => 35,
            'allow_alacarte'    => true
        ]);

        for($i=0; $i<30; $i++){
            factory(Menu::class)->create([
                'company_id'       => $company_ids->random()
            ]);
        }
    }
}