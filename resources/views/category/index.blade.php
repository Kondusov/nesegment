@extends('layouts/main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <div class="col-md-12 fetured-post blog-post" data-aos="fade-right">
                        <ul>
                            @foreach( $categories as $category)
                                <li><a href="{{ route('category.post.index', $category->id) }}" >{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection