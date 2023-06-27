@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Список тегов</h1>
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
        <div class="col-lg-1 col-md-1 col-xs-10">
          <a href="{{ route('admin.tag.create') }}" type="button" class="btn btn-block btn-primary">Создать</a>
        </div>
        <div class="col-12">
          <div class="card-body table-responsive p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th class="text-center">Действие</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tags as $tag)
                <tr>
                  <td>{{$tag->id}}</td>
                  <td>{{$tag->title}}</td>
                  <td class="d-flex justify-content-around px-1">
                    <a href="{{ route('admin.tag.show', $tag->id) }}"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.tag.edit', $tag->id) }}"><i class="fas fa-edit text-success"></i></a>
                    <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST" class="d-inline">
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