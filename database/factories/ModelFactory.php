<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory 
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Branch::class, function (Faker\Generator $faker) {
    return [
        'company_id'   => rand(1,20),
        
        'phone_1'      => $faker->e164PhoneNumber,
        'phone_2'      => $faker->e164PhoneNumber,
        'email_1'      => $faker->email,
        'email_2'      => $faker->email,
        'website'      => $faker->url,
        'facebook'     => $faker->url,
        'twitter'      => $faker->url,
        'instagram'    => $faker->url,
        
        'address'      => $faker->streetName,
        'complement'   => $faker->word,
        'zipcode'      => $faker->postcode,
        'neighborhood' => $faker->word,
        'city'         => $faker->city,
        'state'        => $faker->state,
        'country'      => 'Brazil'
    ];
});


$factory->define(App\Models\BranchImage::class, function (Faker\Generator $faker) {
    $host     = 'http://lorempixel.com';
    $width    = rand(350, 550);
    $height   = rand(350, 550);
    $category = 'fashion';
    $id       = rand(1, 10);
    
    $url      = $host . '/' . $width . '/' . $height . '/' . $category . '/' . $id;

    return [
        'url'               => $url,
        'description'       => $faker->sentence,
        'index'             => 0
    ];
});

$factory->define(App\Models\BranchJob::class, function (Faker\Generator $faker) {
    return [
        'branch_id'         => rand(1,20),
        'job_id'            => rand(1,20),
        'price'             => rand(20, 200),
        'price_sale'        => rand(20, 200),        
        'duration'          => (rand(1, 20))/2
    ];
});

$factory->define(App\Models\BranchJobEmployee::class, function (Faker\Generator $faker) {
    return [
        'branch_job_id'     => rand(1,40),
        'employee_id'       => rand(1,20)
    ];
});

$factory->define(App\Models\BranchUserFavorite::class, function (Faker\Generator $faker) {
    return [
        'branch_id'         => rand(2,20),
        'user_id'           => rand(2,10),
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'user_id'      => rand(1,20),
        'cpf'          => $faker->randomNumber(5),
        'cnpj'         => $faker->randomNumber(5),
        'phone_1'      => $faker->e164PhoneNumber,
        'phone_2'      => $faker->e164PhoneNumber,
      
        'address'      => $faker->streetName,
        'complement'   => $faker->word,
        'zipcode'      => $faker->postcode,
        'neighborhood' => $faker->word,
        'city'         => $faker->city,
        'state'        => $faker->state,
        'country'      => 'Brazil'
    ];
});

$factory->define(App\Models\Coupon::class, function (Faker\Generator $faker) {
    return [
        'code'              => rand(100, 10000),
        'value'             => rand(50, 100)
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    $host     = 'http://lorempixel.com';
    $width    = rand(100, 200);
    $height   = rand(100, 200);
    $category = 'abstract';
    $id       = rand(1, 10);
    
    $url      = $host . '/' . $width . '/' . $height . '/' . $category . '/' . $id;

    return [
        'name'        => $faker->company,
        'description' => $faker->sentence,
        'cpf'         => $faker->randomNumber(5),
        'cnpj'        => $faker->randomNumber(5),
        'avatar'      => $url,//$faker->imageUrl(100,200,'abstract'),

        'phone_1'     => $faker->e164PhoneNumber,
        'phone_2'     => $faker->e164PhoneNumber,
        'email_1'     => $faker->email,
        'email_2'     => $faker->email,
        'website'     => $faker->url,
        'facebook'    => $faker->url,
        'twitter'     => $faker->url,
        'instagram'   => $faker->url,
    ];
});

$factory->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'user_id'      => rand(1,20),
        'branch_id'    => rand(1,30),
        'cpf'          => $faker->randomNumber(5),
        'cnpj'         => $faker->randomNumber(5),
        
        'phone_1'      => $faker->e164PhoneNumber,
        'phone_2'      => $faker->e164PhoneNumber,
        
        'address'      => $faker->streetName,
        'complement'   => $faker->word,
        'zipcode'      => $faker->postcode,
        'neighborhood' => $faker->word,
        'city'         => $faker->city,
        'state'        => $faker->state,
        'country'      => 'Brazil'
    ];
});

$factory->define(App\Models\OauthClient::class, function (Faker\Generator $faker) {
    $name         = $faker->name;
    $code         = md5($faker->name.uniqid(rand(), true));
    $id           = base64_encode(hash_hmac('sha256', $code, 'belezaNameApplication', true));
    $secret       = base64_encode(hash_hmac('sha256', $code, 'belezaSecretApplication', true));

    return [
        'id'                => $id,
        'name'              => $name,
        'secret'            => $secret,        
        'password_client'        => 1,
        'personal_access_client' => 0,
        'redirect'               => '',
        'revoked'                => 0
    ];
});

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id'         => rand(1,10),
        'total'             => rand(50, 50),
        'status'            => 0
    ];
});

$factory->define(App\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [];
});


$factory->define(App\Models\Job::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->word,
        'description'       => $faker->sentence,
        //'price'             => $faker->numberBetween(10, 50)
    ];
});

$factory->define(App\Models\JobCategory::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->word,
        'description'       => $faker->sentence,
    ];
});

$factory->define(App\Models\Time::class, function (Faker\Generator $faker) {
    return [
        'description'       => $faker->time
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'        => $faker->name,
        'last_name'         => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => bcrypt(str_random(10)),
        'remember_token'    => str_random(10),
    ];
});


$factory->define(App\Models\Weekday::class, function (Faker\Generator $faker) {
    return [
        'description'       => $faker->dayOfWeek,
    ];
});