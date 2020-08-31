<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];
    protected $appends = ['full_name'];

    public function books(){
        return $this->belongsToMany('App\Book');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name} {$this->middle_name}";
    }
}
