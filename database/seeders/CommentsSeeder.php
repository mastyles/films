<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comments;
use DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initially adding 3 comments for 3 different movies by different users to the database:
        $comments = [
            [
                'user_id' => 1,
                'film_id' => 1,
                'comment' => "John Wick's been a great action movie. Keanu Reeves does always the best job no matter whether it's an action movie or a Sci-Fi one. Loved watching it!",
            ],
            [
                'user_id' => 2,
                'film_id' => 2,
                'comment' => "The movie was just so-so. No doubt that Salman Khan is an excellent actor but the story was kind of boring.",
            ],
            [
                'user_id' => 1,
                'film_id' => 3,
                'comment' => "Robert De Niro is really a legendary actor. This one was also good. Great comedy, cool story. Enjoyed a lot, recommended!",
            ]
        ];
        Comments::insert($comments);
    }
}
