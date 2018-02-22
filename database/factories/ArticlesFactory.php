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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
    static $password;

    return [
        'title' => "test article by" . $faker->name,
        'user_id'   => 1,
		'content'	=> "test content",
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
