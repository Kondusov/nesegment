@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование пользователя</h1>
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
        <form action="{{ route('admin.user.update', $user->id) }}" method="post" >
          @csrf
          @method('PATCH')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя пользователя</label>
              <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Введите имя">
              @error('name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <label for="exampleInputEmail1">E-mail</label>
              <input name="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="Введите адрес электронной почты">
              @error('email')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <label for="exampleInputEmail1">Пароль</label>
              <input name="password" type="password" class="form-control"  value="{{ $user->password }}" placeholder="Введите пароль">
              @error('password')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Сохранить</button>
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