<?php

namespace FormationLaravel\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Storage;
use Illuminate\Database\Eloquent\Collection;
use FormationLaravel\Repositories\Movies as RepMov;
use FormationLaravel\Movies;
use FormationLaravel\Rooms;


class MoviesController extends Controller
{
    //

    public function all() {
        // return view('movieslist', [
        //     'movies' => $this->movies
        // ]);
        // $view = (View::make('movies.listing'))->with('movies', $this->movies);
        // var_dump($view->render());
        $movies = app()->make('MovieList');
        //Storage::disk('public')->put('test.txt', 'toto');
        return view('movies.listing');
    }

    public function detail(Movies $movies, $id) {
        return view('movies.detail')->with(
            'movie', 
            Movies::where('id', $id)->first()
        );
    }
    public function room() {
        $rooms = Rooms::all();
        return view('movies/listesalles')->with('rooms', $rooms);
    }
}