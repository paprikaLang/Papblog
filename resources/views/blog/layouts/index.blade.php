@extends('blog.layouts.master')

@section('page-header')
    <div id="loader"></div>
    <header class="masthead" style="background-image: url('{{ page_image($page_image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <div id="content">
                            <div class="title" style="font-size: 56px; letter-spacing: 12px;">{{ $title }}</div>
                        </div>
                        {{--</div>--}}
                        <script type="text/javascript">

                            const text = baffle(".title");
                            text.set({
                                characters : '█▓█ ▒░/▒░ █░▒▓/ █▒▒ ▓▒▓/█ ░█▒/ ▒▓░ █<░▒ ▓/░>',
                                speed: 120
                            });
                            text.start();
                            text.reveal(4000);

                        </script>
                        <script type="text/javascript">

                            var loader;
                            function loadNow(opacity) {
                                if(opacity <= 0) {
                                    displayContent();
                                }
                                else {
                                    loader.style.opacity = opacity;
                                    window.setTimeout(function() {
                                        loadNow(opacity - 0.05)
                                    }, 100);
                                }
                            }

                            function displayContent() {
                                loader.style.display = 'none';
                                document.getElementById('content').style.display = 'block';
                            }

                            document.addEventListener("DOMContentLoaded", function() {
                                loader = document.getElementById('loader');
                                loadNow(1);
                            });

                        </script>
                        {{--<span class="subheading">{{ $subtitle }}</span>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{-- 文章列表 --}}
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{ $post->url($tag) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            @if ($post->subtitle)
                                <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                            @endif
                        </a>
                        <p class="post-meta">
                            Posted on {{ $post->published_at->format('Y-m-d') }}
                            @if ($post->tags->count())
                                in
                                {!! join(', ', $post->tagLinks()) !!}
                            @endif
                        </p>
                    </div>
                    <hr>
                @endforeach

                {{-- 分页 --}}
                <div class="clearfix">
                    {{-- Reverse direction --}}
                    @if ($reverse_direction)
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary float-left" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                ←
                                Previous {{ $tag->tag }} Posts
                            </a>
                        @endif
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary float-right" ref="{!! $posts->nextPageUrl() !!}">
                                Next {{ $tag->tag }} Posts
                                →
                            </a>
                        @endif
                    @else
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary float-left" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                ←
                                Newer {{ $tag ? $tag->tag : '' }} Posts
                            </a>
                        @endif
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary float-right" href="{!! $posts->nextPageUrl() !!}">
                                Older {{ $tag ? $tag->tag : '' }} Posts
                                →
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop