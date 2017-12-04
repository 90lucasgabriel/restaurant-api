<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

/**
 * Seed table
 */
class CategoryTableSeeder extends Seeder
{
    /**
     * Execute on init
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => null,
            'id'                => '1',
            'name'              => 'Entrada',
            'description'       => 'Pratos selecionados para serem servidos primeiro.'
        ]);
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => null,
            'id'                => '2',
            'name'              => 'Principal',
            'description'       => 'Principais pratos da casa.'
        ]);
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => null,
            'id'                => '3',
            'name'              => 'Sobremesa',
            'description'       => 'Pratos doces servidos após a refeição principal.'
        ]);
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => null,
            'id'                => '4',
            'name'              => 'Bebidas',
            'description'       => 'Bebidas.'
        ]);
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => '4',
            'name'              => 'Suco',
            'description'       => 'Sucos naturais.'
        ]);
        factory(Category::class)->create([
            'company_id'        => '1',
            'parent_id'         => '4',
            'name'              => 'Refrigerante',
            'description'       => 'Refrigerantes.'
        ]);
    }
}