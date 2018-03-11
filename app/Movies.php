<?php

namespace FormationLaravel;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
    protected $table = 'movies';

    protected $fillable = ['title', 'author', 'year'];

    public function getAuthorAttribute($author) {
        $splited = explode(' ', $author);
        $first = array_shift($splited);
        return [
            'firstname' => $first,
            'lastname' => implode(' ', $splited)
        ];
    }

    public function Rooms() {
        return $this->hasOne('FormationLaravel\Rooms');
    }
    
}
