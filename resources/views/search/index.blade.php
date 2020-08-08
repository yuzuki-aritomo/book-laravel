@extends('layouts.helloapp')

{{-- head内で個別に読み込むファイル --}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

{{-- メインの部分のファイル --}}
@section('main')
<section class="section-search">
    <div class="main-contain">
        <div class="main-left">
            <div class="search">
                <form action="/search" method="POST">
                    @csrf
                    <div>
                        <input class="input-text" type="text" name="search" placeholder="キーワードを入力してください">
                        <input class="input-submit" type="submit" value="検索">
                    </div>
                    <p>※書評が書かれた本のみが検索されます。本を探す場合は上記の「本を探す」から検索してください。</p>
                </form>
            </div>
            <div class="main-content">
                <!--*********************
                    メインアイテム
                    配列の中身がない場合エラーになるためissetで確認後出力
                ************************-->
                @isset($json_decode->{'items'})
                    @foreach ($json_decode->{'items'} as $item)
                        <div class="main-item">
                            <div class="main-item-top">
                                @isset($item->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} )
                                    <div class="main-item-img" style="background-image: url( {{ $item->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} }} );">
                                    </div>
                                @endisset
                                <div class="main-item-ttl">
                                    <h2>{{ $item->{'volumeInfo'}->{'title'} }}</h2>
                                    @isset($item->{'volumeInfo'}->{'authors'})
                                        {{-- *******配列をそのまま出力出来ないのでfor文で出力******* --}}
                                        @foreach ($item->{'volumeInfo'}->{'authors'} as $author)
                                            <h3>{{ $author }} </h3>
                                        @endforeach
                                    @endisset
                                    {{-- <h3>{{ $item->{'volumeInfo'}->{'authors'} }} </h3> --}}
                                    {{-- <h4 class="main-item-ttl-h4">ダイヤモンド社</h4> --}}
                                    @isset($item->{'volumeInfo'}->{'publishedDate'})
                                        <h4>{{ $item->{'volumeInfo'}->{'publishedDate'} }}</h4>
                                    @endisset
                                    {{-- <a href="" class="amazon">Amazon</a> --}}
                                </div>
                            </div>
                            <div class="main-item-bottom">
                                @isset($item->{'volumeInfo'}->{'description'})
                                    @php
                                        //整形したい文字列
                                        $text = $item->{'volumeInfo'}->{'description'};
                                        //文字数の上限
                                        $limit = 190;
                                        if(mb_strlen($text) > $limit) { 
                                            $title = mb_substr($text,0,$limit);
                                            $text = $title." . . .";
                                        }
                                    @endphp
                                    <p>{{ $text }}</p>
                                @endisset
                                @empty($item->{'volumeInfo'}->{'description'})
                                    <p>※この本に説明はありません</p>
                                @endempty
                                <div class="main-item-bottom-btn">
                                    {{-- <a href="{{ action('SearchController@show',$item->id) }}" class="bookshelf">本棚に入れる</a>
                                    <a href="" class="review">書評を見る</a> --}}
                                    <a href="{{ action('SearchController@show',$item->id) }}" class="write">詳細を見る</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</section>
@endsection