<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Like;
use App\Models\User;
use App\Models\Photo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'name' => "john",
            'email' => "utilisateur1@gmail.com",
            'password' => bcrypt("azerty"),
            'overview' => "John's account"
        ]);

        DB::table('users')->insert([
            'name' => "jean",
            'email' => "utilisateur2@gmail.com",
            'password' => bcrypt("azerty"),
            'overview' => "Jean's account"
        ]);

    //PHOTOS
      for ($i = 1; $i <= 5; $i++) {
          DB::table('photos')->insert([
              'title' => Str::random(10),
              'url' => "/images/$i.jpg",
              'note' => $i * 2,
              "user_id" => $i % 2 + 1,
          ]);
      }

    //LIKES
    //   for ($j = 1; $j<=10; $j++) {
    //       $like = new Like();

    //       $like->user_id = User::all()->random(1)->first()->id;
    //       $like->user_id = Photo::all()->random(1)->first()->id;

    //       $like->save();
    //   }
    }
}
