<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Order as ModelOrder;
use App\Models\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(ModelOrder::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'total_price' => $faker->randomFloat(2, 20, 500),
        'status' => $faker->randomElement(['pending', 'completed', 'canceled']),
    ];
});
