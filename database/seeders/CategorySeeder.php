<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();
      $users = User::all();

      $categories=[];
      for ($i=0; $i < 10; $i++) {
        $categories[] = [
          'name' => $faker->name,
          'user_id' => $users->random()->id,
          'created_at' => now(),
          'updated_at' => now()
        ];
      }
      Category::insert($categories);

    }
}
