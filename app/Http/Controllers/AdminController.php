<?php

namespace FormationLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use FormationLaravel\Movies;
use FormationLaravel\Rooms;
use FormationLaravel\Http\Requests\StoreMovie;

class AdminController extends Controller
{
    //
    public function __construct() {

    }

    public function insert(Request $request) {
        $room = new Rooms();
        return view('admin.insert')->with('rooms', $room);
    }

    public function update(Request $request, $id) {
        $movie = Movie::find($id);
        if ($movie !== null) {
            $room = new Rooms();
            return view('admin.insert', ['movie' => $movie, 'room'=> $room]);
        } else {
            return redirect()->route('movieslisting');
        }
    }

    public function valid(StoreMovie $request) {
        $params = $request->except('_token');
       // $request->validate(['title' => 'required|min:3|max:255', 'author'=>'min:3']);
       
        if (isset($params['id'])) {
            $movie = Movies::find($params['id']);
        } else {
            $movie = new Movies();
        }
        $movie->title = $params['title'];
        $movie->author = $params['author'];
        $movie->year = $params['year'];
        $movie->desc = $params['desc'];
        
        if(!isset($movie->room)){
            $room = new Rooms();
        } else {
            $movie = new Movies();
            $room = $movie->rooms;
        }
        foreach($params['room'] as $key => $value) {
            $room->$key = $value;
        }
        $movie->save();
        $movie->rooms()->save($room);

        return redirect()->route('movieslisting');
    }

    public function delete($slug) {

    }
}
