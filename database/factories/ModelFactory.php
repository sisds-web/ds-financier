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

$factory->define(\DSFinancier\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//DEFININDO STATE DA FACTORY
$factory->state(\DSFinancier\Models\User::class,'admin',function (Faker\Generator $faker) {
    return [
        'role'=> \DSFinancier\Models\User::ROLE_ADMIN
    ];
});



$factory->define(\DSFinancier\Models\BankAccount::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->city,
        'agency' => rand(10000,60000).'-'.rand(0,9),
        'account' => rand(70000,260000).'-'.rand(0,9)
    ];
});