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
        $data = "https://www.googleapis.com/books/v1/volumes?q=".$search;
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        return view('search.index',compact("json_decode"));
        // return view('search.index',$json_decode);
    }
}
