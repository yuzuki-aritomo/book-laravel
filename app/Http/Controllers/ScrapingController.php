<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// スクレイピング
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ScrapingController extends Controller
{
    public function index(){
        // $post_data = $request->all();
        // $post_data = "夏目漱石"
        $data = "https://www.googleapis.com/books/v1/volumes?q=夏目漱石";
        $json = file_get_contents($data);
        $json_decode = json_decode($json, true);
        return view('welcome.index', compact("json_decode"));
    }
}
