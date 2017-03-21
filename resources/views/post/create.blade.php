@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6"><h3>Создать</h3></div>
                        </div>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(['method'=>'post', 'class'=>'form-horizontal']) !!}

                        <div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-sm-2  control-label text-left">Название:</label>
                            <div class="col-sm-4">
                                {!! Form::text('title', $post->title, ['class'=>'form-control'] ) !!}
                                {!!
                                $errors->first(
                                    'title',
                                    '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                )
                                !!}
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-sm-2  control-label text-left">Статья:</label>
                            <div class="col-sm-4">
                                {!! Form::textarea('content', $post->content, ['class'=>'form-control', 'rows'=>3] ) !!}
                                {!!
                                $errors->first(
                                    'content',
                                    '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                )
                                !!}
                            </div>
                        </div>


                        <div class="form-group row{{ $errors->has('published') ? ' has-error' : '' }}">
                            <label class="col-sm-2  control-label text-left">Опубликовать:</label>
                            <div class="col-sm-4">
                                {!! Form::checkbox('published', 1, ($post->published == 1 ? true:false)) !!}
                                {!!
                                $errors->first(
                                    'published',
                                    '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                )
                                !!}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                <a href="{{route('users.posts', \Auth::user()->id)}}" class="btn btn-danger">Отмена</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection