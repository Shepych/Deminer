@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:#656e7f">Добавить статью</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        @if(session('success'))
            <div style="background-color: green;color: white">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="background-color: red;color: white">
                {{ session('error') }}
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
                        <form action="{{ route('articleCreate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Заголовок</label>
                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="textAreaContent">Контент</label>
                                    <textarea class="form-control" name="text" id="textAreaContent" cols="30" rows="10"></textarea>
                                </div>

{{--                                <div class="form-check">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                                </div>--}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input name="cover" class="form-control" type="file">
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
