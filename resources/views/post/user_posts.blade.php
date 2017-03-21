@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6"><h3>Статьи пользователя {{$user->name}}</h3></div>
                        <div class="col-sm-6"><a href="{{route('post.create')}}" class="btn btn-success pull-right" style="margin-top: 15px;">Создать</a></div>
                    </div>
                </div>

                <div class="panel-body">

                    @include('partial._messages')

                    @foreach($posts as $post)
                        <article class="article">
                            <h3><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h3>
                            @if($post->published == 0 ) <span class="label label-danger">не опубликована</span> @endif
                            <ul class="list-unstyled list-inline">
                                <li><b>Создана:</b> {{$post->created_at->format('Y-m-d H:i:s')}}</li>
                                <li><b>Обновлена:</b> {{$post->updated_at->format('Y-m-d H:i:s')}}</li>
                                <li><b>Автор:</b> {{$post->user->name}}</li>
                            </ul>
                            @if(\Auth::user()->id ==  $post->user_id)
                            <div>
                                <a href="{{route('post.update', $post->id)}}" class="btn btn-primary">Обновить</a>
                            </div>
                            @endif
                            <hr>
                        </article>
                    @endforeach

                    {!! $posts->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection