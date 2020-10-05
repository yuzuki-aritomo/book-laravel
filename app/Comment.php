<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'requiredshow',
        'book_id' => 'required',
        'text' => 'required',
    );

    public function review()
    {
        return $this->belongsTo('App\Review','book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
