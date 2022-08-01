<?php

namespace Tests\Unit;

use Tests\TestCase;
use DB;

class CommentsTest extends TestCase
{
    /**
     * Add a new comment to the comments table and check the response.
     *
     * @return void
     */
    public function test_add_new_comment()
    {
        $response = DB::table('comments')->insert([
            'user_id' => 1,
            'film_id' => 1,
            'comment' => 'I really liked the John Wick movie!'
        ]);

        $this->assertTrue($response);
    }
}
