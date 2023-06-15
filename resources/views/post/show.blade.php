@extends('layouts/main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Лот - {{ $post->title }} \ заявок {{ $post->comments->count() }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <div class="col-md-12 fetured-post blog-post" data-aos="fade-right">
                        @if($post['image'])
                        @php
                            $post['image'] = json_decode($post['image'], true);
                        @endphp
                        @foreach($post['image'] as $img)
                        <div class="r">
                            <img src="{{ url('storage/' . $img['img_path'] ) }}" class="post-img-size">
                            <a href="{{ url('storage/' . $img['img_path'] ) }}" title="скачать" download>{{ $img['img_origin_name'] }}</a>
                        </div>
                        @endforeach
                        @endif
                        <p class="blog-post-category">{{ $post->created_at }}</p>
                        <a href="#!" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->content }}</h6>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection