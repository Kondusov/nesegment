@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование лота</h1>
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
        <div class="card card-primary">
        </div>
        <form action="{{ route('personal.post.update', $post->id) }}" method="post" enctype="multipart/form-data" >
          @csrf
          @method('PATCH')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Название поста</label>
              <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите название" value="{{ $post->title }}">
              @error('title')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <label for="exampleInputEmail1">Описание</label>
            <textarea name="content" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите текст">{{ $post->content }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Выберите категорию</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Выберите теги</label>
              <select name="tag_ids[]" multiple class="form-control">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <label for="image_uploads">Добавление изображений (PNG, JPG)</label>
          <input type="file" id="image_uploads" name="image[]" accept=".jpg, .jpeg, .png" multiple />
          @error('image')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <label for="image_uploads">Добавление файлов (PDF, TXT, DOC, EXEL, DOCX, ODT)</label>
          <input type="file" id="file_uploads" name="file[]" accept=".pdf, .txt, .doc, .exel, .docx, .odt" multiple />
          @error('file')
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