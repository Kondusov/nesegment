@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Лот создан!</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card-body table-responsive p-0">
          <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Описание</th>
                  <th>Изображения</th>
                  <th>Файлы</th>
                  <th class="text-center">Действие</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->content}}</td>
                  <td>
                    @if($post['image'])
                      @php
                        //var_dump($post['image']);
                        //die();
                        $post['image'] = json_decode($post['image'], true);
                        //var_dump($post['image']);
                        //die();
                      @endphp
                      @foreach($post['image'] as $img)
                      <div>
                        <img src="{{ url('storage/' . $img['img_path'] ) }}" class="w-25">
                        <a href="{{ url('storage/' . $img['img_path'] ) }}" title="скачать" download>{{ $img['img_origin_name'] }}</a>
                      </div>
                      @endforeach
                    @endif
                  </td>
                  <td>
                    @if($post['file'])
                    @php
                    $post['file'] = json_decode($post['file'], true);
                    @endphp
                    @foreach($post['file'] as $file)
                      <a href="{{ url('storage/' . $file['file_path'] ) }}" title="скачать" download>{{ $file['file_origin_name'] }}</a>
                    @endforeach
                    @endif
                  </td>
                  <td class="d-flex justify-content-around px-1">
                    <a href="{{ route('post.show', $post->id) }}"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('personal.post.edit', $post->id) }}"><i class="fas fa-edit text-success"></i></a>
                    <a href="{{ route('personal.post.cancel', $post->id) }}"><i class="fas fa-ban text-danger"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>


        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection