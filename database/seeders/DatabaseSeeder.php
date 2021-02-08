<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProducerSeeder;
use Database\Seeders\ProductSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cs = new CategorySeeder();
        $producerSeeder = new ProducerSeeder();
        $productSeeder = new ProductSeeder();

        $cs->run();
        $producerSeeder->run();
        $productSeeder->run();
    }
}
