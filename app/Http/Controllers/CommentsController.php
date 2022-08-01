<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // All the comments by all the registered users:
    public function index()
    {
        $data = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('films', 'films.id', '=', 'comments.film_id')
            ->paginate(10);

        return view('comments', compact('data'))->render();
    }

    // The logged in user's comments only:
    public function my_comments()
    {
        $data = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('films', 'films.id', '=', 'comments.film_id')
            ->where('comments.user_id', '=', Auth::user()->id)
            ->paginate(10);

        return view('comments', compact('data'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Auth::check()) {
            $film_data = json_decode(DB::table("films")->where('name', '=', $request->name)->get('id'));
            if(!empty($film_data)) {
                $comment_data = [
                    'user_id' => Auth::user()->id,
                    'film_id' => $film_data[0]->id,
                    'comment' => $request->comment
                ];
                $comment_status = Comments::create($comment_data);
            }
        }
        return redirect()->route('all-comments');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
