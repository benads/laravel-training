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

use App\Models\Post;
use App\Models\Tag;

$factory->define(App\Models\PostTag::class, function (Faker\Generator $faker) {
    return [
        'tag_id' => function () {
            $tags = Tag::all();
            return array_rand($tags->pluck('id')->toArray());
        },
        'post_id' => function () {
            $posts = Post::all();
            return array_rand($posts->pluck('id')->toArray());
        },
    ];
});
