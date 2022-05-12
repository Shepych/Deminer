@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:#656e7f">Редактирование статьи</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        @if(session('success'))
            <div class="alert alert-success" style="margin-left: 7px;margin-right: 7px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->post->any())
            <div class="alert alert-danger" style="margin-left: 7px;margin-right: 7px;">
                <ul style="margin-bottom: 0;">
                    @foreach ($errors->post->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('articleEdit', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Заголовок</label>
                                    <input name="title" value="{{ $post->title }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="textAreaContent">Контент</label>
                                    <textarea class="form-control" name="text" id="textAreaContent" cols="30" rows="10">{{ $post->content }}</textarea>
                                </div>

{{--                                <div class="form-check">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                                </div>--}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <img id="img2" src="/{{ $post->img }}" class="admin__edit__img">
                                <img id="img1" style="display:none" src="/{{ $post->img }}" class="admin__edit__img">
                            </div>

                            <div class="card-footer" style="display: flex;justify-content: center;align-items: center">
                                <input style="width:auto;margin-right: 10px" id="edit__file" name="cover" class="form-control" type="file">
                                <a class="btn btn-danger" onclick="something_happens()">
                                    отменить картинку
                                </a>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить статью</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
