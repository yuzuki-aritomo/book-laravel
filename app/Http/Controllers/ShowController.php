<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Review;

class ShowController extends Controller
{
    public function index(){
        // $items = Review::all();
        $items = DB::table('review')->get();
        return view('show.index',['items' => $items]);
    }
    public function show($id){
        $item = DB::table('review')->where('id',$id)->first();
        $data = "https://www.googleapis.com/books/v1/volumes/".$item->book_id;
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        $comments = Review::find($id)->comment;
        // return view('show.show',['item' => $item,compact("json_decode")]);
        return view('show.show',compact("json_decode","item","comments"));
    }
}
