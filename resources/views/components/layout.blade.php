<!DOCTYPE html>
<html lang="ja" class="scroll">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta content="たからのポートフォリオサイトです。今までの作品を全て掲載しています。" name="description">
    <meta property="og:title" content="たからのポートフォリオサイト" />
    <meta property="og:description" content="たからのポートフォリオサイトです。今までの作品を全て掲載しています。" />
    <meta property="og:type" content="<?php if($_SERVER["REQUEST_URI"] == "/"){echo "website";}else{echo "article";} ?>" />
    <meta property="og:url" content="{{ (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];}} " />
    <meta property="og:image" content="{{ url('images/common/ogimage.webp') }}" />
    <meta property="og:site_name" content="たからのポートフォリオサイト" />
    <meta property="og:locale" content="ja_JP"  />

    {{-- noindex --}}
    <meta name="robots" content="noindex,nofollow">
    {{-- swiper --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    {{-- fontawsom --}}
    <script src="https://kit.fontawesome.com/92c8320555.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    <link rel="stylesheet" href="/css/style.css">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body id="body"
{{ isset($body_class) ? "class=${body_class}" : '' }}
>
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <script>
        window.onload = ()=>{
            const spinner = document.getElementById('loading');
            spinner.classList.add('loaded');
            }
    </script>

    @if ($admin == 'false')
    <header id="header">
        <div id="app">
            <gnav-component></gnav-component>
        </div>
    </header>
    @endif
    <main class="main">
        {{ $slot }}
    </main>
    @if ($admin == 'true')
    <div class="sidebar-posts">
        <aside>
            <h3>
                @if ( $sub_title == 'work' )
                Work 管理画面
                @else
                Blog 管理画面
                @endif
            </h3>
            <div class="posts-menus">
                @if ( $sub_title == 'work' )
                <a href="/admin/blog" class="posts-menu">ブログへ</a>
                @else
                <a href="/admin/work" class="posts-menu">実績へ</a>
                @endif
                <a href="/" class="posts-menu">ホームページ</a>
                <a href="/admin/{{ $sub_title }}/create" class="posts-menu">作成</a>
                <a href="/admin/{{ $sub_title }}/" class="posts-menu">一覧</a>
            </div>
        </aside>
        <footer>
            <small>
                © 2022 Takara Tomita
            </small>
        </footer>
    </div>
    @endif
    @if ($admin == 'false' && trim($body_class) !== 'works-detail')
    <footer>
        <small>
            © 2022 Takara Tomita
        </small>
    </footer>
    @endif

    {{-- swiper --}}
    {{-- <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
