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
                        <h3>著者名　岸見一郎</h3>
                        <div>
                            @isset($json_decode->{'volumeInfo'}->{'description'})
                                <p>{{ $json_decode->{'volumeInfo'}->{'description'} }}</p>
                            @endisset
                            @empty($json_decode->{'volumeInfo'}->{'description'})
                                <p>※この本に説明はありません</p>
                            @endempty
                        </div>
                        <div class="show-write">
                            <a href="" class="write">書評を書く</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection