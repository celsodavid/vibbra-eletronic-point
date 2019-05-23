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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'login' => str_replace('.', '', str_replace(' ', '', $faker->unique()->name)),
        'password' => app('hash')->make('12345')
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    $users = App\User::all(['id']);
    return [
        'title' => $faker->title,
        'description' => $faker->unique()->text,
        'user_id' => $users
    ];
});
