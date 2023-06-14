@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Комментарии</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
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
                  <th>Текст комментария</th>
                  <th class="text-center">Действие</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comments as $comment)
                <tr>
                  <td>{{$comment->id}}</td>
                  <td>{{$comment->message}}</td>
                  <td class="d-flex justify-content-around px-1">
                    <a href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fas fa-edit text-success"></i></a>
                    <form action="{{ route('personal.comment.delete', $comment->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="col-md-auto">
                        <i class="fas fa-trash text-danger"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
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