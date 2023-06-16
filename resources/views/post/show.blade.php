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
            <section class="comments-list">
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                  <span class="description">Shared publicly - 7:30 PM Today</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>Far far away, behind the word mountains, far from the
                  countries Vokalia and Consonantia, there live the blind
                  texts. Separated they live in Bookmarksgrove right at</p>

                <p>the coast of the Semantics, a large language ocean.
                  A small river named Duden flows by their place and supplies
                  it with the necessary regelialia. It is a paradisematic
                  country, in which roasted parts of sentences fly into
                  your mouth.</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image">

                  <div class="attachment-pushed">
                    <h4 class="attachment-heading"><a href="https://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                    <div class="attachment-text">
                      Description about the attachment can be placed here.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="../dist/img/user5-128x128.jpg" alt="User Image">
                    @foreach($post->comments as $comment)
                        <div class="comment-text">
                            <span class="username">
                            {{ $comment->user->name }}
                            <span class="text-muted float-right">{{ $comment->created_at }}</span>
                            </span><!-- /.username -->
                            {{ $comment->message }}
                        </div>
                    @endforeach
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            </section>
            @auth()
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
        </div>
    </main>
@endsection