@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление пользователя</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
            <li class="breadcrumb-item active">Добавить пользователя</li>
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
        <form action="{{ route('admin.user.store') }}" method="post" >
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя пользователя</label>
              <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Введите имя">
              @error('name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label>Роль пользователя</label>
                <select class="form-control" name="role" >
                    @foreach($roles as $id => $role)
                      <option value="{{ $id }}"
                      {{ $id == old('role') ? 'selected' : '' }}
                      >{{ $role }}
                      </option>
                    @endforeach
                </select>
              </div>
              @error('role_id')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <label for="exampleInputEmail1">E-mail</label>
              <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Введите адрес электронной почты">
              @error('email')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <label for="exampleInputEmail1">Пароль</label>
              <input name="password" type="password" class="form-control" placeholder="Введите пароль">
              @error('password')
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