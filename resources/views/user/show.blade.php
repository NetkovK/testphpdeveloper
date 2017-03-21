@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6"><h3>@if($user->id)Обновить @else Создать @endif</h3></div>
                        </div>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(['method'=>'post', 'class'=>'form-horizontal']) !!}

                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-sm-2  control-label text-left">Имя:</label>
                                <div class="col-sm-4">
                                    {!! Form::text('name', $user->name, ['class'=>'form-control'] ) !!}
                                    {!!
                                    $errors->first(
                                        'name',
                                        '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                    )
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-sm-2  control-label text-left">Email:</label>
                                <div class="col-sm-4">
                                    {!! Form::email('email', $user->email, ['class'=>'form-control'] ) !!}
                                    {!!
                                    $errors->first(
                                        'email',
                                        '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                    )
                                    !!}
                                </div>
                            </div>


                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-sm-2  control-label text-left">Пароль:</label>
                                <div class="col-sm-4">
                                    {!! Form::password('password', ['class'=>'form-control'] ) !!}
                                    {!!
                                    $errors->first(
                                        'password',
                                        '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                    )
                                    !!}
                                </div>
                            </div>


                            <div class="form-group row{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label class="col-sm-2  control-label text-left ">Роль:</label>
                                <div class="col-sm-4">
                                    @foreach($roles as $role)
                                        <label class="form-control-static">
                                            {!! Form::radio('role_id', $role->id, ($user->role_id == $role->id ? true : false) ) !!}
                                            {!! $role->display_name !!}
                                        </label>
                                    @endforeach
                                    {!!
                                    $errors->first(
                                        'role_id',
                                        '<span class="label label-warning label-block text-center error-validation">:message</span>'
                                    )
                                    !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                    <a href="{{route('users')}}" class="btn btn-danger">Отмена</a>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection