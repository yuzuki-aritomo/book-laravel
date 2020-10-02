@extends('layouts.helloapp')

{{-- head内で個別に読み込むファイル --}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
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
                        <h2><span>{{ $json_decode->{'volumeInfo'}->{'title'} }}</span></h2>
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
                    {{-- <form action="/Post/create" method="POST"> --}}
                    <form action="{{ action('PostController@create',$json_decode->id) }}" method="POST">
                        @csrf
                        <table>
                            {{-- <tr>
                                <th><input class="border" name="user_id" type="number"></th>
                            </tr> --}}
                            {{-- 必要な本の情報、本のid、本の題名、作者、サムネ画像リンク、説明文 --}}
                            <input class="border" name="user_id" value="{{ Auth::id() }}" type="hidden">
                            <input class="border" name="book_id" value="{{ $json_decode->id }}" type="hidden">
                            <input class="border" name="book_title" value="{{ $json_decode->{'volumeInfo'}->{'title'} }}" type="hidden">
                            @isset($json_decode->{'volumeInfo'}->{'authors'})
                                @foreach ($json_decode->{'volumeInfo'}->{'authors'} as $author)
                                    @php
                                        if ($author === reset($json_decode->{'volumeInfo'}->{'authors'})) 
                                        {
                                            $tmp = $author;
                                        }
                                        @endphp
                                        <input class="border" name="book_author" value="{{ $tmp }} " type="hidden">
                                @endforeach
                            @endisset
                            @isset($json_decode->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} )
                                <input class="border" name="book_img" value="{{ $json_decode->{'volumeInfo'}->{'imageLinks'}->{'thumbnail'} }}" type="hidden">
                            @endisset
                            <tr>
                                <th>
                                    <h2>タイトル</h2>
                                    <input class="border" name="title" value="{{$item->title}}" type="text">
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2>本文</h2>
                                    <textarea name="text" cols="30" rows="25">{{ $item->text }}</textarea>
                                </td>
                            </tr>
                        </table>
                        <input class="form-btn" value="書き込む" type="submit">
                    </form>
                </div>
            </div>
        </section>
@endsection