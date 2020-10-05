@extends('layouts.helloapp')

{{-- head内で個別に読み込むファイル --}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

{{-- メインの部分のファイル --}}
@section('main')
        <section class="section-show">
            <div class="main-contain">
                <div class="show-top">
                    @isset($json_decode->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} )
                        <div class="show-left"><img src={{ $json_decode->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} }} alt=""></div>
                    @endisset
                    <div class="show-right">
                        @isset( $json_decode->{'volumeInfo'}->{'title'} ) 
                            <h2><span>{{ $json_decode->{'volumeInfo'}->{'title'} }}</span></h2>
                        @endisset
                        @isset($json_decode->{'volumeInfo'}->{'authors'})
                            {{-- *******配列をそのまま出力出来ないのでfor文で出力******* --}}
                            @foreach ($json_decode->{'volumeInfo'}->{'authors'} as $author)
                                <h3>{{ $author }} </h3>
                            @endforeach
                        @endisset
                        <div>
                            @isset($json_decode->{'volumeInfo'}->{'description'})
                                <p>{{ $json_decode->{'volumeInfo'}->{'description'} }}</p>
                            @endisset
                            @empty($json_decode->{'volumeInfo'}->{'description'})
                                <p>※この本に説明はありません</p>
                            @endempty
                        </div>
                        {{-- <div class="show-write">
                            <a href="{{ action('PostController@index',$json_decode->id) }}" class="write">書評を書く</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

        <section class="section-show">
            <div class="main-contain">
                <div class="show-bottom">
                    <h2>{{ $item->title }}</h2>
                    <div class="show-bottom-text">
                        <p>
                            {{ $item->text }}
                        </p>
                    </div>
                    <h3>コメント</h3>
                    <div class="show-comment">
                        <div class="show-comment-one">
                            <img src="{{ asset('/img/horse.jpg') }}" alt="">
                            <p>面白かったですddddddddddddddddddddddddddddddddddddddddddsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdd</p>
                            <h4>2020/5/3</h4>
                        </div>
                        <div class="show-comment-one">
                            <img src="{{ asset('/img/cat.jpg') }}" alt="">
                            <p>楽し方です！！</p>
                            <h4>2020/5/23</h4>
                        </div>
                    </div>
                    <h3>コメントを書く</h3>
                    <div class="show-comment-write">
                        <div class="cp_iptxt">
                            <form action="{{ action('CommentsController@create',$item->id) }}" method="POST">
                                @csrf
                                <label class="ef">
                                    <!-- <input type="textarea" placeholder="コメント"> -->
                                    <textarea name="text" id="" cols="90" rows="10"></textarea>
                                </label>
                                <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                                <input type="hidden" value="{{ $item->id }}" name="book_id">
                                <input type="submit" value="コメントを送信">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection