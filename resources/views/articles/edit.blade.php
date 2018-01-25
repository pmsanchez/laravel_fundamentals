@extends('app')


@section('content')


    <h1>Edit: {!! $article->title !!}</h1>

    {!! Form::model($article, ['method' => 'PATCH','action'=>['ArticlesController@update',$article->id]])!!}

        @include('articles.form',['submitButtonText'=>'Update Article'])

    {!! Form::close()!!}


<!--Validation MEthods -->

        <!--Validation MEthods -->
        @include('errors/list')




@stop