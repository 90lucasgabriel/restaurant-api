<?php

use Illuminate\Database\Seeder;
use App\Models\Time;

class TimeTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE users CASCADE');
        Time::truncate();
        for($i=0; $i<24; $i++){
            $hour    = $i;
            if($i<10) $hour = '0' . $hour;

            factory(Time::class)->create([
                'description'    => $hour . ':00' 
            ]);
            factory(Time::class)->create([
                'description'    => $hour . ':30'
            ]);
        };
    }
}
