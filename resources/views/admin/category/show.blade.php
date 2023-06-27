@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Категория : {{ $category->title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
            <li class="breadcrumb-item active">Просмотр категории</li>
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
            <table class="table table-hover text-nowrap">
              <tbody>
                <tr>
                  <td>ID</td>
                  <td>Категория</td>
                  <td class="text-center">Действие</td>
                </tr>
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td class="d-flex justify-content-around px-1">
                    <a title="Редактировать" href="{{ route('admin.category.edit', $category->id) }}"><i class="fas fa-edit text-success"></i></a>
                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="col-md-auto">
                        <i title="Удалить" class="fas fa-trash text-danger"></i>
                      </button>
                    </form>
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