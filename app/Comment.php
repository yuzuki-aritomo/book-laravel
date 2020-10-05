<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'book_id' => 'required',
        'text' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User','usr_id');
    }

    public function review()
    {
        return $this->belongsTo('App\User','usr_id');
    }

}
