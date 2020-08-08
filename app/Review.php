<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'book_id' => 'required',
        'title' => 'required',
        'text' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getData(){
        return $this->id . $this->title . $this->user->id;
    }

}
