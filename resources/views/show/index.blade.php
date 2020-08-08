@extends('layouts.helloapp')

{{-- head内で個別に読み込むファイル --}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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

                <!--*********************
                    メインアイテム
                ************************-->
                @foreach ($items as $item)
                    <div class="main-item">
                        <div class="main-item-top">
                            <div class="main-item-img">
                                <img src="{{ $item->book_img }}" alt="">
                            </div>
                            <div class="main-item-ttl">
                                <h2>{{ $item->book_title }}</h2>
                                <h3>{{ $item->book_author }} </h3>
                                <div class="main-item-chara">
                                    {{-- <h4>ミステリー</h4>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="main-item-bottom">
                            <h2><span>{{ $item->title }}</span></h2>
                            <p>
                                @php
                                    //整形したい文字列
                                    $text = $item->text;
                                    //文字数の上限
                                    $limit = 190;
                                    if(mb_strlen($text) > $limit) { 
                                        $title = mb_substr($text,0,$limit);
                                        $text = $title." . . .";
                                    }
                                @endphp
                                {{ $text }}
                            </p>
                            <div class="main-item-bottom-btn">
                                {{-- <a href="" class="bookshelf">本棚に入れる</a> --}}
                                <a href="{{ action('ShowController@show', $item->id) }}" class="review">書評を見る</a>
                            </div>
                            <h3 class="item-time">2020/04/13</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection