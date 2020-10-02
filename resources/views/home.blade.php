{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

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
            {{-- <div class="search">
                <form action="/search" method="POST">
                    @csrf
                    <div>
                        <input class="input-text" type="text" name="search" placeholder="キーワードを入力してください">
                        <input class="input-submit" type="submit" value="検索">
                    </div>
                    <p>※書評が書かれた本のみが検索されます。本を探す場合は上記の「本を探す」から検索してください。</p>
                </form>
            </div> --}}
            <div class="main-content">
                <!--*********************
                    メインアイテム
                    配列の中身がない場合エラーになるためissetで確認後出力
                ************************-->
                    @foreach ($items as $item)
                        <div class="main-item">
                            <div class="main-item-top">
                                <div class="main-item-img" style="background-image: url( {{ $item->book_img }})"></div>
                                <div class="main-item-ttl">
                                    <h2>{{ $item->book_title }}</h2>
                                    <h3>{{ $item->book_author }} </h3>
                                    <h4>{{ $item->created_at }}</h4>
                                    {{-- <a href="" class="amazon">Amazon</a> --}}
                                </div>
                            </div>
                            <div class="main-item-bottom">
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
                                <p>{{ $text }}</p>
                                <div class="main-item-bottom-btn">
                                    <a href="{{ action('ShowController@show',$item->id) }}" class="write">詳細を見る</a>
                                    <a href="{{ action('PostController@edit',$item->id) }}" class="bookshelf">修正する</a>
                                    <a href="{{ action('PostController@delete',$item->id) }}" class="review">削除する</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
