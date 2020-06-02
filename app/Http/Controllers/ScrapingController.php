<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// スクレイピング
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ScrapingController extends Controller
{
    // public function index()
    // {
    //     // ここではアマゾンカメラランキングをスクレイピング
    //     $goutte = GoutteFacade::request('GET', 'https://www.amazon.co.jp/s?k=%E3%82%B8%E3%83%A7%E3%83%BC%E3%82%AB%E3%83%BC%E3%83%BB%E3%82%B2%E3%83%BC%E3%83%A0&i=stripbooks&__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&ref=nb_sb_noss');

    //     //画像を取得するための配列を準備
    //     $images = array();
    //     //テキストを取得するための配列を準備
    //     $texts = array();

    //     //画像のsrc部分を取得
    //     $goutte->filter('.s-image')->each(function ($node) use (&$images) {
    //         $images[] = $node->attr('src');
    //     });

    //     //テキストを取得
    //     $goutte->filter('.a-size-medium')->each(function ($node) use (&$texts) {
    //         $texts[] = $node->text();
    //     });

    //     $params = [
    //         'images' => $images,
    //         'texts' => $texts,
    //     ];
    //     return view('welcome.index', $params);
    // }
    public function index(){
        // $post_data = $request->all();
        // $post_data = "夏目漱石"
        $data = "https://www.googleapis.com/books/v1/volumes?q=夏目漱石";
        $json = file_get_contents($data);
        $json_decode = json_decode($json, true);
        return view('welcome.index', compact("json_decode"));
    }
}
