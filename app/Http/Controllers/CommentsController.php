<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function create(Request $request){
        $book_id = $request->book_id;
        $rules = [
            'book_id' => 'required',
            'user_id' => 'required',
            'text' => 'required',
        ];
        $this ->validate($request, $rules);
        
        $params = [
            'book_id' => $book_id,
            'user_id' => $request->user_id,
            'text' => $request->text,
        ];
        DB::table('comment')->insert($params);
        return redirect("/show/$book_id");
    }
    // public function update(){

    // }
    // public function delete(){

    // }
}
