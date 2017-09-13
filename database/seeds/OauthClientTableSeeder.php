<?php

use Illuminate\Database\Seeder;
use App\Models\OauthClient;

class OauthClientTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE oauth_clients CASCADE');
        OauthClient::truncate();
        factory(OauthClient::class)->create([
            "id"    => "d24d6167e707c17d32d2776d77822aaa",
            "name"  => "Ionic",
            "secret"=> "a12fd0b68d342918910b8750650d6dce"
        ]);
        //factory(OauthClient::class, 10)->create();   
    }
}