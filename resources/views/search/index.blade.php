@extends('layouts.helloapp')

{{-- head内で個別に読み込むファイル --}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

{{-- メインの部分のファイル --}}
@section('main')
<section>
    <div class="main-contain">
        <div class="main-left">
            <div class="search">
                <form action="">
                    <div>
                        <input class="input-text" type="text" placeholder="キーワードを入力してください">
                        <input class="input-submit" type="submit" value="検索">
                    </div>
                    <p>※書評が書かれた本のみが検索されます。本を探す場合は上記の「本を探す」から検索してください。</p>
                </form>
            </div>
            <div class="main-content">
                <!--*********************
                    メインアイテム
                ************************-->
                <div class="main-item">
                    <div class="main-item-top">
                        <div class="main-item-img"></div>
                        <div class="main-item-ttl">
                            <h2>嫌われる勇気</h2>
                            <h3>古賀史健 </h3>
                            <h4 class="main-item-ttl-h4">ダイヤモンド社</h4>
                            <h4>2020/4/13</h4>
                            <a href="" class="amazon">Amazon</a>
                        </div>
                    </div>
                    <div class="main-item-bottom">
                        <p>「あの人」の期待を満たすために生きてはいけない―
                            【対人関係の悩み、人生の悩みを１００％消し去る
                            〝勇気〟の対話篇】世界的にはフロイト、ユングと並ぶ
                            心理学界の三大巨匠とされながら、日本国内では無名に
                            近い存在のアルフレッド・アドラー。
                            </p>
                            <div class="main-item-bottom-btn">
                                <a href="" class="bookshelf">本棚に入れる</a>
                                <a href="" class="review">書評を見る</a>
                                <a href="" class="write">書評を書く</a>
                            </div>
                    </div>
                </div>

                <!--*********************
                    メインアイテム
                ************************-->
                <div class="main-item">
                    <div class="main-item-top">
                        <div class="main-item-img"></div>
                        <div class="main-item-ttl">
                            <h2>嫌われる勇気</h2>
                            <h3>古賀史健 </h3>
                            <h4 class="main-item-ttl-h4">ダイヤモンド社</h4>
                            <h4>2020/4/13</h4>
                            <a href="" class="amazon">Amazon</a>
                        </div>
                    </div>
                    <div class="main-item-bottom">
                        <p>「あの人」の期待を満たすために生きてはいけない―
                            【対人関係の悩み、人生の悩みを１００％消し去る
                            〝勇気〟の対話篇】世界的にはフロイト、ユングと並ぶ
                            心理学界の三大巨匠とされながら、日本国内では無名に
                            近い存在のアルフレッド・アドラー。
                            </p>
                            <div class="main-item-bottom-btn">
                                <a href="" class="bookshelf">本棚に入れる</a>
                                <a href="" class="review">書評を見る</a>
                                <a href="" class="write">書評を書く</a>
                            </div>
                    </div>
                </div>

                <!--*********************
                    メインアイテム
                ************************-->
                <div class="main-item">
                    <div class="main-item-top">
                        <div class="main-item-img"></div>
                        <div class="main-item-ttl">
                            <h2>嫌われる勇気</h2>
                            <h3>古賀史健 </h3>
                            <h4 class="main-item-ttl-h4">ダイヤモンド社</h4>
                            <h4>2020/4/13</h4>
                            <a href="" class="amazon">Amazon</a>
                        </div>
                    </div>
                    <div class="main-item-bottom">
                        <p>「あの人」の期待を満たすために生きてはいけない―
                            【対人関係の悩み、人生の悩みを１００％消し去る
                            〝勇気〟の対話篇】世界的にはフロイト、ユングと並ぶ
                            心理学界の三大巨匠とされながら、日本国内では無名に
                            近い存在のアルフレッド・アドラー。
                            </p>
                            <div class="main-item-bottom-btn">
                                <a href="" class="bookshelf">本棚に入れる</a>
                                <a href="" class="review">書評を見る</a>
                                <a href="" class="write">書評を書く</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection