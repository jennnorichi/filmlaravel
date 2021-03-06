<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Film;
use App\Http\Resources\Film as FilmResource;
use App\Genre;
use App\FilmGenre;
use App\FilmComments;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function view($id)
    {
        return new FilmResource(Film::find($id));
    }

    public function index()
    {
        $films = Film::latest()->paginate(1);
        return view('film.index',compact('films'))
            ->with('i', (request()->input('page', 1) - 1) * 1);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('name','id');
        return view('film.create', compact('genres'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:films|max:25',
            'rating' => 'required',
            'release_date' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('images'), $imageName);
        //echo "<pre>";
        //$request->merge($request->all(), ['photo' => $imageName, 'release_date' => date("Y-m-d", strtotime(str_replace('-','/', $request->release_date)))]); 
        $data = array_merge($request->all(),  ['photo' => $imageName, 'release_date' => date("Y-m-d", strtotime(str_replace('-','/', $request->release_date)))]); 
        //print_r($data);exit;
        $filmId = Film::create($data);

        foreach ($request['genre'] as $genre) {
            FilmGenre::create(['film_id' => $filmId->id, 'genre_id' => $genre]);
        }

        return redirect()->route('films.index')
                        ->with('success','Film created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $film = Film::where('slug',$slug)->first();
        return view('film.view',compact('film'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $genres = Genre::pluck('name','id');
        $film = Film::where('slug',$slug)->first();
        return view('film.edit',compact('film', 'genres'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required|max:25|unique:films,id, '.$film->id,
            'rating' => 'required',
            'release_date' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = array_merge($request->all(),  ['release_date' => date("Y-m-d", strtotime(str_replace('-','/', $request->release_date)))]);   
        if ($request->hasFile('photo'))
        {
            $imageName = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('images'), $imageName);
            //echo "<pre>";
            //$request->merge($request->all(), ['photo' => $imageName, 'release_date' => date("Y-m-d", strtotime(str_replace('-','/', $request->release_date)))]); 
            $data = array_merge($request->all(),  ['photo' => $imageName, 'release_date' => date("Y-m-d", strtotime(str_replace('-','/', $request->release_date)))]);            
        }

        $film->update($data);
        FilmGenre::where('film_id', $film->id)->delete();
        foreach ($request['genre'] as $genre) {
            FilmGenre::create(['film_id' => $film->id, 'genre_id' => $genre]);
        }

        return redirect()->route('films.index')
                        ->with('success','Film updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Film::destroy($id);
        return redirect()->route('films.index')
                        ->with('success','Film deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addcomment(Request $request, $slug)
    {
        $userId = Auth::id();
        request()->validate([
            'comment' => 'required|max:120'
        ]);
        $film = Film::where('slug',$slug)->first();

        FilmComments::create(['film_id'=> $film->id, 'user_id'=>$userId, 'comment'=>$request['comment']]);
        return redirect()->route('films.show', ['slug'=>$slug])
                        ->with('success','Comment successfully');
    }
}
