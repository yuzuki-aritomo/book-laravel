<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search.index');
    }
    public function post(Request $request){
        // バリデーション
        $validate_rule = ['search' => 'required'];
        $this->validate($request, $validate_rule);
        // GoogleAPIの処理
        $search = $request->search;
        $search_val = str_replace(' ','+',$search);
        $data = "https://www.googleapis.com/books/v1/volumes?q=".$search_val."&maxResults=20"."&country=JP";
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        return view('search.index',compact("json_decode"));
    }
    public function show($id){
        $data = "https://www.googleapis.com/books/v1/volumes/".$id;
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        return view('search.show',compact("json_decode"));
    }
}
