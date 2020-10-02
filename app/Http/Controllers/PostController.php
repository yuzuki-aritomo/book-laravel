<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Review;

class PostController extends Controller
{
    public function index($id){
        $data = "https://www.googleapis.com/books/v1/volumes/".$id;
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        return view('post.index',compact("json_decode"));
    }

    public function create(Request $request){
        $params = [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_img' => $request->book_img,
            'title' => $request->title,
            'text' => $request->text,
        ];
        DB::table('review')->insert($params);
        return redirect('/');
    }
    
    public function edit($id){
        $item = DB::table('review')->where('id',$id)->first();
        $data = "https://www.googleapis.com/books/v1/volumes/".$item->book_id;
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        return view('post.edit',compact("json_decode","item"));
    }
    // public function update(Request $request){
    //     $id = $request->id;
    //     $params = [
    //         'id' = $request->id,
    //         'user_id' => $request->user_id,
    //         'book_id' => $request->book_id,
    //         'book_title' => $request->book_title,
    //         'book_author' => $request->book_author,
    //         'book_img' => $request->book_img,
    //         'title' => $request->title,
    //         'text' => $request->text,
    //     ];
    //     DB::table('review')->where('id',$id)->first()->update($params);
    //     return redirect('/');
    // }
    public function delete($id){
        // $data = "https://www.googleapis.com/books/v1/volumes/".$id;
        // $json = file_get_contents($data);
        // $json_decode = json_decode($json);
        // return view('post.index',compact("json_decode"));
    }
}
