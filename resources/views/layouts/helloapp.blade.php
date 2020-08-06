<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>人生の一冊</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="css/search.css"> --}}
    @yield('head')
</head>
<body>
    
    <!-- ************************
        header
    ***************************-->
    <section>
        <div class="head">
            <div class="head-contain">
                <h1>人生の1冊</h1>
                <a href="">お問い合わせ</a>
                <a href="">新規登録/ログイン</a>
            </div>
        </div>
    </section>

    <!-- ************************
        top
    ***************************-->
    <section>
        <img class="top-logo" src="img/top-logo.png" alt="">
        <div class="top-contain">
            <div class="top-btn">
                <a href="">書評</a>
                <a href="">本を探す</a>
                <a href="">人生の一冊</a>
                <a href="">おすすめする</a>
            </div>
        </div>
    </section>

    <!-- ************************
        main
    ***************************-->
    @yield('main')
<!--*********************
        フッター
    ************************-->
    <section>
        <div class="f-footer">
            <section>
                <p></p>
            </section>
        </div>
    </section>
</body>
</html>