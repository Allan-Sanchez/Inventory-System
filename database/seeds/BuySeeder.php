<?php

use Illuminate\Database\Seeder;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Buy::class,10)->create();

    }
}
