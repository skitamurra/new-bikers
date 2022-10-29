<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ここにサイト説明を入れます">
    <meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!--小さな端末用（800px以下端末）のロゴとメニュー-->
            <div id="sh">
                <nav id="menubar-s">
                    <ul>
                        <li><a href="/"><span>ホーム</span>Home</a></li>
                        <li><a href="about.html"><span>当サイトについて</span>About</a></li>
                        <li><a href="works.html"><span>作品</span>Works</a></li>
                        <li><a href="link.html"><span>リンク</span>Link</a></li>
                        <li><a href="contact.html"><span>お問い合わせ</span>Contact</a></li>
                    </ul>
                </nav>
            </div>
            <h2 id="newinfo_hdr" class="close"><span></span>Time Line</h2></br>
            <div id="container">
                <div id="main">
                    <section id="new" class="box">
                    @yield('content')
                    </section>
                </div>
        <!--/main-->
        
        <div id="sub">
    
            <!--PC用（801px以上端末）ロゴ-->
            <!--<h1 class="logo"><a href="index.html"><img src="images/logo.png" alt="Biker's"></a></h1>-->
            
            <!--PC用（801px以上端末）メニュー-->
            <nav id="menubar">
                <ul>
                    <li><a href="/"><span>ホーム</span>Home</a></li>
                    <li><a href="about.html"><span>当サイトについて</span>About</a></li>
                    <li><a href="works.html"><span>作品</span>Works</a></li>
                    <li><a href="link.html"><span>リンク</span>Link</a></li>
                    <li><a href="contact.html"><span>お問い合わせ</span>Contact</a></li>
                </ul>
            </nav>
        
        </div>
        <!--/sub-->
    
        <p id="pagetop"><a href="#">↑</a></p>
        
        <footer>
            <small>Copyright&copy; <a href="index.html">Sample Web Site</a> All Rights Reserved.</small>
            <span class="pr"><a href="http://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
        </footer>
        
        </div>
        <div id="menubar_hdr" class="close"><span></span><span></span><span></span></div>
    </div>
</body>
</html>
