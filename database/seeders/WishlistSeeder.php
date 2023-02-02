<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wishlist;
use Faker\Factory;

class WishlistSeeder extends Seeder
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
      $categories = Category::all();

      $wishlists = [];
      for ($i = 0; $i < rand(100, 120); $i++) {
          // randon user id and group id
          $user_id = $users->random()->id;
          $wishlists[] =
              [
                  'user_id' => $user_id,
                  // 'category_id' => $categories->random()->id,
                  'name' => $faker->sentence,
                  'url' => $faker->url,
                  'price' => $faker->randomFloat(2, 1, 1000),
                  'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker'),
                  'repeat_purchase' => $faker->boolean,
                  'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                  'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
              ];
      }
      Wishlist::insert($wishlists);
    }
}
