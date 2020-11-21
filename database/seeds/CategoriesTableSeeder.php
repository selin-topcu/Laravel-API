<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        //DB::table('categories')->truncate();
        \App\Category::truncate();
        for($i=0; $i<30; $i++)
        {
            $category_name=rtrim($faker->sentence(1));
            \App\Category::create([
                'name'=> $category_name,
                 'slug'=>Str::slug($category_name)
            ]);
        }
    }
}
