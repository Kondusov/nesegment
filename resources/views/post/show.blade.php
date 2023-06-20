@extends('layouts/main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title text-decoration-underline" data-aos="fade-up">{{ $post->title }}</h1>
            <section class="comments-list">
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="" alt="User Image">
                  <span class="username"><a href="#">{{ $post->owner->name }}</a></span>
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
                  <button type="button" class="btn btn-tool" title="Написать сообщение пользователю {{ $post->owner->name }} ">
                    <i class="fas fa-envelope"></i>
                  </button>
                  <span class="description float-right">Заявок - {{ $post->comments->count() }}</span>
                  <span class="description float-right mx-3">Статус : {{ $post['statusPostTitle'] }}</span>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                 
                <span class="float-right text-muted">*Здесь будет что-то*</span>
              </div>
              <!-- /.card-body -->
              @foreach($post->comments as $comment)
              <div class="card-footer card-comments">
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  
                    
                      <img class="img-circle img-sm" src="" alt="User Image">
                        <div class="comment-text">
                            <span class="username">
                            {{ $comment->user->name }}
                            <span class="text-muted float-right">{{ $comment->created_at }}</span>
                            </span><!-- /.username -->
                            {{ $comment->message }}
                        </div>
                    
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              @endforeach
              @if($post['commentWriteAvailable'] != 0) <!-- если одна заявка текущим пользователем уже была подана, то не выводим форму новой заявки -->
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                @csrf
                  <div>
                    <span>Подать заявку</span>
                  </div>
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input name="message" type="text" class="form-control form-control-sm" placeholder="Текст вашего предложения">
                  </div>
                  <div class="">
                    <input type="submit" class="form-control form-control-sm w-25 btn btn-primary text-light mt-1" value="Отправить" placeholder="Отправить">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
              @endif
            </div>
            </section>
            @if($commentWriteAvailable === 0)
              <h2 class="section-title mt-5 aos-init aos-animate" data-aos="fade-up">Ваша заявка принята!</h2>
            @endif
            @auth()
            @if($post['commentWriteAvailable'] != 0)
            <section class="comment-section">
                        <h2 class="section-title mb-5 aos-init aos-animate" data-aos="fade-up">Создать заявку</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 aos-init aos-animate" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Здесь опишите свое предложение." rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 aos-init" data-aos="fade-right">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                                </div>
                                <div class="form-group col-md-4 aos-init" data-aos="fade-up">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="">
                                </div>
                                <div class="form-group col-md-4 aos-init" data-aos="fade-left">
                                    <label for="website" class="sr-only">Website</label>
                                    <input type="url" name="website" id="website" class="form-control" placeholder="Website*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 aos-init" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                    @endif
        </div>
    </main>
@endsection