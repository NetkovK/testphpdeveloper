@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6"><h3>Пользователи</h3></div>
                            <div class="col-sm-6"><a href="{{route('user')}}" class="btn btn-success pull-right" style="margin-top: 15px;">Создать</a></div>
                        </div>
                    </div>

                    <div class="panel-body">

                        @include('partial._messages')

                        <table class="table">
                            <thead>
                            <tr class="table-header">
                                <th width="40px">№</th>
                                <th>Имя</th>
                                <th>Почта</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($users))
                                <tr>
                                    <td colspan="4" class="text-center"><h4>Ничего не найдено</h4></td>
                                </tr>
                            @else
                                @php($number = ($users->currentPage()-1)*$users->perPage())
                                @foreach($users as $user)
                                    @php($number++)
                                    <tr>
                                        <td>{{$number}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-right">
                                            <a href="{{route('users.posts', $user->id)}}" class="btn btn-warning">Статьи</a>
                                            @if(\Auth::user()->role_id == \App\Models\Role::ADMIN && $user->id != 1)
                                                <a href="{{route('user', $user->id)}}" class="btn btn-primary">Редактировать</a>
                                                <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">Удалить</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if(!$users->isEmpty()) {!! $users->render() !!} @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection