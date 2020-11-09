@extends('layouts.main')

@section('content')
	<section itemscope="" itemtype="http://schema.org/BlogPosting">
		<div class="wrapper">
			<header>
				<h1 itemprop="name headline mainEntityOfPage">{{ $post->title }}</h1>
				<ul class="subline">
					<li><time itemprop="datePublished"
							datetime="2020-05-19T00:00:00+00:00"> {{ date('d F Y', strtotime($post->updated_at))}} </time></li>
				</ul>
			</header>
			<article class="main" itemprop="articleBody">
				<div>
					@php 
						echo $post->content_html; 
					@endphp
				</div>
			</article>
		</div>
		<div class="wrapper">
			<related-posts />
		</div>
		<div id="wpac-comment"></div>
	</section>
@endsection