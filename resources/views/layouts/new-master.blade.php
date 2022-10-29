<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Biker's</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="{{ asset('js/app.js') }}" defer></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<!--小さな端末用（800px以下端末）のロゴとメニュー-->
<div id="sh">
<nav id="menubar-s">
<ul>
<li><a href="index.html"><span>ホーム</span>Home</a></li>
<li><a href="about.html"><span>当サイトについて</span>About</a></li>
<li><a href="works.html"><span>作品</span>Works</a></li>
<li><a href="link.html"><span>リンク</span>Link</a></li>
<li><a href="contact.html"><span>お問い合わせ</span>Contact</a></li>
</ul>
</nav>
</div>

<div id="container">

<div id="main">

<section id="new" class="box">
<h2 id="newinfo_hdr" class="close"><span>Time Line</span></h2>
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
<li><a href="index.html"><span>ホーム</span>Home</a></li>
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
<!--/container-->

<!--更新情報の開閉処理条件設定　800px以下-->
<script>
if (OCwindowWidth() <= 800) {
	open_close("newinfo_hdr", "newinfo");
}
</script>

<!--メニューの３本バー-->
<div id="menubar_hdr" class="close"><span></span><span></span><span></span></div>

<!--メニューの開閉処理条件設定　800px以下-->
<script>
if (OCwindowWidth() <= 800) {
	open_close("menubar_hdr", "menubar-s");
}
</script>

</body>
</html>
