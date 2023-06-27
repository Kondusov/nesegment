@extends('layouts/main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title text-decoration-underline" data-aos="fade-up">{{ $post->title }}</h1>
            <section class="comments-list">
            <div class="card card-widget blog-post">
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
                 
                <!--<span class="float-right text-muted">*Здесь будет что-то*</span>-->
              </div>
              <!-- /.card-body -->
              @foreach($post->comments as $comment)
              <div class="card-footer card-comments">
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  
                    
                      <img class="img-circle img-sm" src="" alt="User Image">
                      @if($comment->id == $post->best_comment_id)
                      <span class=" float-right bg-warning">Выбран исполнитель</span>
                      @endif
                        <div class="comment-text">
                            <span class="username">
                            {{ $comment->user->name }}
                            <span class="text-muted float-right">{{ $comment->created_at }}</span>
                            </span><!-- /.username -->
                            <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end"><p>{{ $comment->message }}</p></div>
                        </div>
                    
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                @if( $post->owner->id == $post['auth_user'] && $post->best_comment_id == NULL )
                  <div class="card-footer">
                    <form action="{{ route('post.comment.best.store', $post->id) }}" method="post">
                    @csrf
                      <div class="form-check">
                        <input name="best_comment_required" class="form-check-input" type="checkbox" value="" id="flexCheckDefault"  required>
                        <label class="form-check-label" for="flexCheckDefault">
                          Принять это предложение
                        </label>
                      </div>
                      <input type="hidden" name="post_status" value="2">
                      <input type="hidden" name="best_comment_id" id="" value="{{ $comment->id }}">
                      <input type="hidden" name="best_comment_user_id" id="" value="{{ $comment->user->id }}">
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Подтвердить</button>
                      </div>
                    </form>
                  </div>
                @elseif($post->owner->id == $post['auth_user'] && $post->best_comment_id != NULL && $post->status_post == 2 && $comment->id == $post->best_comment_id )
                <div class="card-footer">
                    <form action="{{ route('post.comment.best.store', $post->id) }}" method="post">
                    @csrf
                      <div class="form-check">
                        <input name="best_comment_completed" class="form-check-input" type="checkbox" value="1" title="Отметьте только в том случае, если вся работа выполнена исполнителем."  required>
                        <label class="form-check-label" for="flexCheckDefault">
                          Работа выполнена
                        </label>
                      </div>
                      <input type="hidden" name="post_status" value="3">
                      <input type="hidden" name="best_comment_id" id="" value="{{ $comment->id }}">
                      <input type="hidden" name="best_comment_user_id" id="" value="{{ $comment->user->id }}">
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Подтвердить выполнение</button>
                      </div>
                    </form>
                  </div>
                @endif
              </div>
              @php
                //var_dump($post->best_comment_id, auth()->user()->id);
                //die();
              @endphp
              @if($post->best_comment_id == auth()->user()->id)//Здесь еще не дописана логика 
                <h2 class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end" data-aos="fade-up">Ваша заявка принята!</h2>
              @endif
              @endforeach
              @if($commentWriteAvailable != 0) <!-- если одна заявка текущим пользователем уже была подана, то не выводим форму новой заявки -->
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
            
            @auth()
            @endauth
        </div>
    </main>
@endsection