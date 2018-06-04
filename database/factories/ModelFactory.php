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
 * 
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
        'company_id'        => rand(1,20),

        'phone_1'           => $faker->phoneNumberCleared(false),
        'phone_2'           => $faker->phoneNumberCleared(false),
        'email_1'           => $faker->companyEmail,
        'email_2'           => $faker->companyEmail,
        'website'           => $faker->url,
        'facebook'          => $faker->url,
        'twitter'           => $faker->url,
        'instagram'         => $faker->url,

        'address'           => $faker->streetName,
        'number'            => rand(10,2000),
        'complement'        => $faker->word,
        'zipcode'           => $faker->postcode,
        'neighborhood'      => $faker->word,
        'city'              => $faker->city,
        'state'             => $faker->stateAbbr,
        'country'           => 'Brasil'
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'company_id'        => rand(1,20),
        'parent_id'         => $faker->randomNumber(5),
        'name'              => $faker->name,
        'description'       => $faker->text,
        'image'             => $faker->imageUrl(rand(100, 200), rand(100, 200), 'abstract', true, rand(1, 10)),
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'user_id'           => rand(1,20),
        'cpf'               => $faker->randomNumber(5),
        'cnpj'              => $faker->randomNumber(5),
        'phone_1'           => $faker->e164PhoneNumber,
        'phone_2'           => $faker->e164PhoneNumber,

        'address'           => $faker->streetName,
        'complement'        => $faker->word,
        'zipcode'           => $faker->postcode,
        'neighborhood'      => $faker->word,
        'city'              => $faker->city,
        'state'             => $faker->stateAbbr,
        'country'           => 'Brazil'
    ];
});

$factory->define(App\Models\Coupon::class, function (Faker\Generator $faker) {
    return [
        'code'              => rand(100, 10000),
        'value'             => rand(50, 100)
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->company,
        'description'       => $faker->realText(300),
        'cnpj'              => $faker->cnpj,
        'avatar'            => $faker->imageUrl(rand(100, 200), rand(100, 200), 'abstract', true, rand(1, 10)),
        'website'           => $faker->url,
        'facebook'          => $faker->url,
        'twitter'           => $faker->url,
        'instagram'         => $faker->url,
    ];
});

$factory->define(App\Models\Diningtable::class, function (Faker\Generator $faker) {
    return [
        'branch_id'         => rand(1,10),
        'code'              => rand(1,50),
        'description'       => $faker->text
    ];
});

$factory->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'user_id'           => rand(1,20),
        'branch_id'         => rand(1,30),
        'cpf'               => $faker->randomNumber(5),
        'cnpj'              => $faker->randomNumber(5),

        'phone_1'           => $faker->e164PhoneNumber,
        'phone_2'           => $faker->e164PhoneNumber,

        'address'           => $faker->streetName,
        'complement'        => $faker->word,
        'zipcode'           => $faker->postcode,
        'neighborhood'      => $faker->word,
        'city'              => $faker->city,
        'state'             => $faker->stateAbbr,
        'country'           => 'Brazil'
    ];
});

$factory->define(App\Models\Menu::class, function (Faker\Generator $faker) {
    return [
        'company_id'        => rand(1,20),
        'name'              => $faker->name,
        'description'       => $faker->text,
        'price_person'      => rand(20,100),
        'allow_alacarte'    => true
    ];
});

$factory->define(App\Models\MenuTime::class, function (Faker\Generator $faker) {
    return [
        'company_id'        => rand(1,20),
        'day'               => rand(0,6)
        // 'time_start'        =>
        // 'time_end'          =>
    ];
});

$factory->define(App\Models\OauthClient::class, function (Faker\Generator $faker) {
    $name                   = $faker->name;
    $code                   = md5($faker->name.uniqid(rand(), true));
    $id                     = base64_encode(hash_hmac('sha256', $code, 'belezaNameApplication', true));
    $secret                 = base64_encode(hash_hmac('sha256', $code, 'belezaSecretApplication', true));

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
        'company_id'        => rand(1,20),
        'branch_id'         => rand(1,20),
        'diningtable_id'    => rand(1,10),
        'order_status_id'   => rand(1,3),
        'total'             => rand(50, 300)
    ];
});

$factory->define(App\Models\OrderStatus::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'description'       => $faker->text
    ];
});

$factory->define(App\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [
        'order_id'         => rand(1,10),
        'menu_id'          => rand(1,10),
        'product_id'       => rand(1,10),
        'diningtable_id'   => rand(1,10),
        'order_item_status_id'  => rand(1,5),
        'order_item_type_id'    => rand(1,2),
        'price_person'     => rand(30,90),
        'price_alacarte'   => rand(15,100),
        'quantity'         => rand(1,4),
        'comment'          => $faker->text
    ];
});

$factory->define(App\Models\OrderItemStatus::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'description'       => $faker->text
    ];
});

$factory->define(App\Models\OrderItemType::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'description'       => $faker->text
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'company_id'        => rand(1,20),
        'category_id'       => $faker->randomNumber(5),
        'name'              => $faker->name,
        'description'       => $faker->text,
        'image'             => $faker->imageUrl(rand(100, 200), rand(100, 200), 'abstract', true, rand(1, 10)),
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