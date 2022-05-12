@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:#656e7f">Список статей</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="padding: 0 1em">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                            Заголовок
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>
                                    {{ $article->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $article->title }}
                                    </a>
                                    <br>
                                    <small>
                                        {{ $article->publication }}
                                    </small>
                                </td>
                                <td class="project-actions text-right">
                                    <a target="_blank" class="btn btn-primary btn-sm" href="{{ route('article', $article->url) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('articleEdit', $article->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a href="{{ route('article.delete', $article->id) }}" onclick="return window.confirm('Подтвердите удаление');" class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
