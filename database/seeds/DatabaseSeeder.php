<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(BuySeeder::class);
        $this->call(InventorySeeder::class);
    }
}
