<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(Product::class,10)->create();
        factory(User::class,10)->create();
    }
}
