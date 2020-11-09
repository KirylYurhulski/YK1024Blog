<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
	lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	xml:lang="en-US"
	itemscope=""
	itemtype="http://schema.org/WebSite">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Kiril Yurgulsky blogging about SAP technology and object oriented programming." />
	<meta name="keywords" content="SAP, SAP UI5, blog, programming blog, software blog, software development blog, Kiril Yurgulsky blog" />
	<meta name="viewport"
		content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="author" content="Kiril Yurgulsky ">
	<meta name="og:site_name" content="Kiril Yurgulsky " />
	<meta name="og:type" content="article" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/layout.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
	<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
	<div class="wrapper">
		<aside class="header-toggle unprintable" id="header-toggle"
			title="Show the menu"
			onclick="$('#header').show();$('#header-toggle').hide();">&#9776;</aside>
		<header class="header" id="header">
			<div class="face">
				<img src="{{ asset('images\about\profile.png') }}" class="photo" alt="Kiril Yurgulsky" />
			</div>
			<div class="bio">
				{{ __('messages.welcome') }}<br>
			</div>
			<nav>
				<ul class="menu social notranslate">
					<li>
						<a itemprop="sameAs" href="{{ url('https://github.com/KirylYurhulski') }}" rel="nofollow" title="My GitHub profile">
							<img src="https://img.icons8.com/material/24/000000/github.png" alt="My GitHub profile"/>
						</a>
					</li>
					<li>
						<a itemprop="sameAs" href="{{ url('https://www.instagram.com/yurgulya/') }}" rel="nofollow" title="Follow me on Instagram">
							<img src="https://img.icons8.com/material/24/000000/instagram-new--v1.png" alt="Follow me on Instagram"/>
						</a>
					</li>
					<li><a itemprop="sameAs" href="{{ url('http://www.linkedin.com/in/kirylyurhulskiy-a71250144') }}" rel="nofollow" title="My LinkedIn profile">
							<img src="https://img.icons8.com/material/24/000000/linkedin--v1.png" alt="My LinkedIn profile"/>
						</a>
					</li>
				</ul>
				<ul class="menu">
					<li>
					    <a class="nav-link" href="{{ url('/') }}">{{ __('messages.mainMenu.home') }}</a>
					</li>
					@foreach($categories as $category)
						<li>
							<a href="{{ route('blog.category.show', $category->id) }}">{{ $category->title }}</a>
						</li>
					 @endforeach
				</ul>
			</nav>
			<div class="gcse-search"></div>
			<div class="hot">
				<ul></ul>
			</div>
		</header>
	</div>

	@yield('content')

	<div class="wrapper">
		<footer class="footer">
			<p>&copy; <span itemscope="" itemprop="copyrightHolder" itemtype="http://schema.org/Person">
				<span itemprop="name">{{ __('messages.copyright') }} YK</span>
			</p>
		</footer>
	</div>

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
	<script async src="https://cse.google.com/cse.js?cx=001059939696221486207:6eqnx1ozi9g"></script>
    <script type="text/javascript">
        wpac_init = window.wpac_init || [];
        wpac_init.push({widget: 'Comment', id: 22330});
        (function() {
            if ('WIDGETPACK_LOADED' in window) return;
                WIDGETPACK_LOADED = true;
                var mc = document.createElement('script');
                mc.type = 'text/javascript';
                mc.async = true;
                mc.src = 'https://embed.widgetpack.com/widget.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
        })();
    </script>
</body>
</html>
