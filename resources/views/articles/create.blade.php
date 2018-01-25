@extends('app')


@section('content')
    <h1>PLease write a NEW Article</h1>

    <!--insert line-->
    <hr/>


        {!! Form::open(['url' => 'articles'])!!}

            @include('articles.form',['submitButtonText'=>'Add Article'])


        {!! Form::close()!!}


        <!--Validation MEthods -->
        @include('errors/list')

@stop