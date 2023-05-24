@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление поста</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <div class="card card-primary">
        </div>
        <form action="{{ route('admin.post.store') }}" method="post" >
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Название поста</label>
              <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите название" value="{{ old('title') }}">
              @error('title')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <label for="exampleInputEmail1">Описание</label>
              <textarea name="content" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите текст">{{ old('content') }}</textarea>
              @error('content')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
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