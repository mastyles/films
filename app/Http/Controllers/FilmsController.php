<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Films;
use Validator;
use DB;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //This index method shows all the films page-wise (1 film per 1 page):
    public function index()
    {
        // I have not set OrderBy Desc clause here. It's useful when a new film is created and we want to view the new record on first page.
        // Here's the expression for it: $data = DB::table("films")->orderBy('updated_at', 'desc')->paginate(1)
        $data = DB::table("films")->paginate(1);
        return view('home', compact('data'));

        if($request->ajax()) {
            $data = DB::table("films")->paginate(1);
            return redirect('home', compact('data'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Create method to create a new film with validations:
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'description' => ['required', 'string', 'max:500'],
            'ticket_price' => ['string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $film_data = $request->all();
        $film_data['slug'] = Str::slug($request->name, '-');

        if(!is_null($request->photo)) {
            $photo_name = time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $photo_name);
            $film_data['photo'] = $photo_name;
        }

        Films::create($film_data);
        return redirect()->route('films');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // N/A at the moment.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($film_slug=null)
    {
        $data = DB::table('films')->where('slug', $film_slug)->paginate(1);
        return view('home', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Can be useful while updating an existing film (which was actually not part of the task though).
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Basic setup for updating a film but not implemented on the front-end side:
    public function update(Request $request, $id)
    {
        $films->update($request->all());
        return response()->json([
            'message' => "Films updated successfully!",
            'films' => $films
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // This was not the part of the task but I implemented it as it took a short time:
    public function destroy($id=null)
    {
        $film = Films::find($id);
        $ret = $film->delete($id);
        return redirect()->route('films');
    }
}
