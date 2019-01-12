<?php

use Faker\Generator as Faker;


$factory->define(App\SocialAccount::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'provider' => $faker->name,
        'provider_id' => str_random(10),
        'token' => str_random(10),
    ];
});
