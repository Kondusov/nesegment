@extends('layouts/main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Завершенные лоты</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-12 fetured-post blog-post" data-aos="fade-right">
                    <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="" alt="User Image">
                  <span class="username"><a href="#">{{ $post->ownerPost->name }}</a></span>
                  <span class="description float-right">Опубликовано - {{ $post->created_at }}</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Информация о пользователе">
                    <i class="fas fa-info"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Отправить жалобу на лот или пользователя">
                    <i class="fas fa-bolt"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Написать сообщение пользователю {{ $post->ownerPost->name }} ">
                    <i class="fas fa-envelope"></i>
                  </button>
                  <span class="description float-right">Заявок - {{ $post->comments->count() }}</span>
                  <span class="description float-right mx-3">Статус : {{ $post['statusPostTitle'] }}</span>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h4 class="">{{ $post->title }}</h4>
                <!-- post text -->
                <p>{{ $post->content }}</p>
                @if($post['image'] || $post['file'] )
                  <!-- Attachment -->
                  <div class="attachment-block clearfix">

                    <div class="attachment-pushed">
                      <div class="attachment-text">
                        Прикрепленные файлы:
                      </div>
                      <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                  </div>
                  <!-- /.attachment-block -->
                @endif
                <!-- Social sharing buttons -->
                @if($post['image'])
                        @php
                            $post['image'] = json_decode($post['image'], true);
                        @endphp
                  @foreach($post['image'] as $img)
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-images"></i> 
                  <a href="{{ url('storage/' . $img['img_path'] ) }}" title="скачать" download>{{ $img['img_origin_name'] }}</a>
                </button>
                  @endforeach
                @endif
                @if($post['file'])
                    @php
                    $post['file'] = json_decode($post['file'], true);
                    @endphp
                    @foreach($post['file'] as $file)
                      <button type="button" class="btn btn-default btn-sm"><i class="far fa-file"></i>
                        <a href="{{ url('storage/' . $file['file_path'] ) }}" title="скачать" download>{{ $file['file_origin_name'] }}</a>
                      </button>
                    @endforeach
                    @endif
                 
                <span class="float-right text-muted text-underline"><a href="{{ route('post.show', $post->id) }}" >Подробнее</a></span>
              </div>
              <!-- /.card-body -->
            </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">{{ $posts->links() }}</div>
            </section>
        </div>
    </main>
@endsection