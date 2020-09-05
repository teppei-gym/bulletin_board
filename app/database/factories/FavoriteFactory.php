<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Favorite;
use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$userId = [User::min('id'), User::max('id')];

$factory->define(Favorite::class, function (Faker $faker) use ($userId) {
    return [
        'user_id' => $faker->numberBetween($userId[0], $userId[1]),
        'post_id' => $faker->numberBetween(1, 50),
    ];
});
