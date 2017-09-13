<?php

use Illuminate\Database\Seeder;
use App\Models\Weekday;

class WeekdayTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE users CASCADE');
        Weekday::truncate();
        factory(Weekday::class)->create([
            'description'    => 'DOMINGO'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'SEGUNDA-FEIRA'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'TERÇA-FEIRA'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'QUARTA-FEIRA'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'QUINTA-FEIRA'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'SEXTA-FEIRA'
        ]);
        factory(Weekday::class)->create([
            'description'    => 'SÁBADO'
        ]);
    }
}
