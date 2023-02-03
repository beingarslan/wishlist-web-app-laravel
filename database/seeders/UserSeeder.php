<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();
      $users = [
        [
            'name' => $faker->name,
            'wishlist_name' => $faker->sentence(1),
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ],
        [
            'name' => $faker->name,
            'wishlist_name' =>  $faker->sentence(1),
            'email' => 'user@user.com',
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now()
        ],
        [
            'name' => $faker->name,
            'wishlist_name' =>  $faker->sentence(1),
            'email' => $faker->email,
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now()
        ],
        [
            'name' => $faker->name,
            'wishlist_name' =>  $faker->sentence(1),
            'email' => $faker->email,
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now()
        ],
        [
            'name' => $faker->name,
            'wishlist_name' =>  $faker->sentence(1),
            'email' => $faker->email,
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now()
        ],
        [
            'name' => $faker->name,
            'wishlist_name' =>  $faker->sentence(1),
            'email' => $faker->email,
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now()
        ]
      ];

      foreach ($users as $user) {
          $_user = User::create($user);
          if ($_user->email == 'admin@admin.com' || $_user->email == 'nick1.bremec@gmail.com') {
              $_user->assignRole('admin');
          } else {
              $_user->assignRole('user');
          }
      }


        // $faker = Factory::create();
        //   for ($i=0; $i <5 ; $i++) {
        //     $user = new User();
        //     $user->name = $faker->name();
        //     $user->email = $faker->email();
        //     $user->password = Hash::make('1234567890');
        //     $user->save();
        //     $user->assignRole('user');
        //   }
        //     $user = new User();
        //     $user->name = 'admin';
        //     $user->email = 'admin@admin.com';
        //     $user->password = Hash::make('1234567890');
        //     $user->save();
        //     $user->assignRole('admin');
        // $users = [
        //     [
        //         'name' => 'admin',
        //         'email' => 'admin@admin.com',
        //         'password' => Hash::make('1234567890')
        //     ],
        //     [
        //         'name' => $faker->name(),
        //         'email' => 'user@user.com',
        //         'password' => Hash::make('1234567890')
        //     ],
        //     [
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('1234567890')
        //     ],
        //     [
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('1234567890')
        //     ],
        //     [
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('1234567890')
        //     ],
        //     [
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('1234567890')
        //     ],
        // ];

        // $users = User::insert($users);

    }
}
