<?php

namespace FormationLaravel\Http\ViewComposers;

use FormationLaravel\Repositories\Movies as RepMov;
use FormationLaravel\Movies;
use Illuminate\View\View;

class MovieComposer {

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    public function compose(View $view) {

        $view->with('movies', Movies::all());
    }
}