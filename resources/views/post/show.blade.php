@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6"><h3>{{$post->title}}</h3></div>
                    </div>
                </div>

                <div class="panel-body">

                    @include('partial._messages')

                        <article class="article">
                            <h3><a href="#">{{$post->title}}</a></h3>
                            <ul class="list-unstyled list-inline">
                                <li><b>Создана:</b> {{$post->created_at->format('Y-m-d H:i:s')}}</li>
                                <li><b>Обновлена:</b> {{$post->updated_at->format('Y-m-d H:i:s')}}</li>
                                <li><b>Автор:</b> {{$post->user->name}}</li>
                            </ul>
                            <div class="article-content">{!! $post->content !!}</div>
                        </article>

                </div>
            </div>
        </div>
    </div>
@endsection