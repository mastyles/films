<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use DB;

class FilmsTest extends TestCase
{
    /**
     * Testing if '/' route redirects to somewhere else with a 302 status code.
     *
     * @return void
     */
    public function test_baseURL()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    /**
     * Testing the '/' URL to '/films/' URL.
     *
     * @return void
     */
    public function test_baseURL_to_filmsURL()
    {
        $response = $this->get('/');

        $response->assertRedirect('/films/');
    }

    /**
     * Test if the api /api/films can fetch the result (films) or not.
     *
     * @return void
     */
    public function test_films_data_api()
    {
        $response = $this->getJson('/api/films/');

        $response->assertStatus(200);
    }

    /**
     * Create a new film and check response.
     *
     * @return void
     */
    public function test_add_new_film()
    {
        $response = DB::table('films')->insert([
            'name' => 'Some Movie',
            'slug' => 'some-movie',
            'description' => 'This is just the test description of a test movie.',
            'release_date' => '2002-10-06',
            'rating' => '3',
            'ticket_price' => '$100',
            'photo' => null,
            'country' => 'India',
            'genre' => 'Sci-Fi',
        ]);

        $this->assertTrue($response);
    }

}
