<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Employee;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE users CASCADE');
        User::truncate();
        factory(User::class)->create([
            'first_name'     => 'Teixeira',
            'last_name'      => 'Gabriel',
            'email'          => 'llucasgabriell@gmail.com',
            'role'           => 'admin',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'first_name'     => 'Gabriel',
            'last_name'      => 'Teixeira',
            'email'          => 'admin@email.com',
            'role'           => 'admin',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'first_name'     => 'Client',
            'last_name'      => 'User',
            'email'          => 'client@email.com',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'first_name'     => 'Employee',
            'last_name'      => 'User',
            'email'          => 'employee@email.com',
            'role'           => 'employee',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());


        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });

        factory(User::class, 50)->create([
            'role'           => 'employee',
        ])->each(function($u){
            $u->employee()->save(factory(Employee::class)->make());
        });;
    }
}
