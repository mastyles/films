<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Films;
use DB;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initially adding 3 movies to the database:
        $films = [
            [
                'name' => 'John Wick',
                'slug' => 'john-wick',
                'description' => "Legendary assassin John Wick (Keanu Reeves) retired from his violent career after marrying the love of his life. Her sudden death leaves John in deep mourning. When sadistic mobster Iosef Tarasov (Alfie Allen) and his thugs steal John's prized car and kill the puppy that was a last gift from his wife, John unleashes the remorseless killing machine within and seeks vengeance. Meanwhile, Iosef's father (Michael Nyqvist) -- John's former colleague -- puts a huge bounty on John's head.",
                'release_date' => '2014-11-07',
                'rating' => 5,
                'ticket_price' => '$500',
                'photo' => '1659380887.png',
                'country' => 'United States of America',
                'genre' => 'Action'
            ],
            [
                'name' => 'Kick',
                'slug' => 'kick',
                'description' => "Devi, a man who cannot stay put as he is addicted to going on new adventures, breaks up with his girlfriend, Shaina, who is a Warsaw-based psychiatrist, just to pursue his daredevil ambitions.",
                'release_date' => '2014-06-25',
                'rating' => 3,
                'ticket_price' => '$200',
                'photo' => '1659380977.png',
                'country' => 'India',
                'genre' => 'Thriller'
            ],
            [
                'name' => 'Analyze This',
                'slug' => 'analyze-this',
                'description' => "Ben Sobol, a psychiatrist, faces several problems in his personal life. One day, when he crashes into a mob boss's car, the dangerous criminal pays him a visit and shares his inner conflicts with him.",
                'release_date' => '1999-03-05',
                'rating' => 4,
                'ticket_price' => '$250',
                'photo' => '1659381051.png',
                'country' => 'United States of America',
                'genre' => 'Comedy'
            ]
        ];
        Films::insert($films);
    }
}
