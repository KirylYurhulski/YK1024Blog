@extends('layouts.main')

@section('content')

@foreach($posts as $post)
	<div itemscope="" itemtype="http://schema.org/Blog">
		<div class="wrapper">
			<section class="front" itemprop="blogPosts" itemscope=""
					itemtype="http://schema.org/BlogPosting">
			<header>
				<h1>
					<a href="{{ route('blog.posts.show', $post->id) }}">
						<span itemprop="name headline mainEntityOfPage">
							{{ $post->title }}
						</span>
					</a>
				</h1>
				<ul class="subline">
					<li>
						<time itemprop="datePublished dateModified" datetime="2020-05-19T00:00:00+00:00">
							{{ date('d F Y', strtotime($post->updated_at))}}
						</time>
					</li>
			 	</ul>
			</header>
			<div class="main" itemprop="description">
				<p>
				    @php 
						echo $post->excerpt;
	                @endphp
				</p>
			</div>
			<p>
				<a href="{{ route('blog.posts.show', $post->id) }}" itemprop="url">Continue... </a>
			</p>
			</section>
		</div>
	</div>
@endforeach

<div class="wrapper">
	<footer>
		<div class="pagination">
			<div class="left">
				<a href="{{ $posts->previousPageUrl() }}"><i>Back</i></a>
			</div>
				page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
			<div class="right">
				<a href="{{ $posts->nextPageUrl() }}"><i>Next</i></a>
			</div>
		</div>
	</footer>
</div>
@endsection