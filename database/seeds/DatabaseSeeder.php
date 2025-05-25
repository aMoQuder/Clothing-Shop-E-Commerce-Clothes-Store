<?php

use App\Model\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 5)->create();
    }
}
