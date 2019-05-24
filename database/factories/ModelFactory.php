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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Administrator',
        'email' => 'admin@eletronic.com',
        'login' => 'admin',
        'password' => app('hash')->make('12345')
    ];
});

$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->unique()->text,
        'user_id' => [1]
    ];
});

$factory->define(App\Models\TimeRecording::class, function (Faker\Generator $faker) {
    return [
        'projects_id' => 1,
        'started_at' => $faker->unique()->dateTime(),
        'ended_at' => $faker->unique()->dateTime()
    ];
});
