@extends('app')


@section('content')
    <h1>{{$article->title}}</h1>

    <!--insert line-->
    <hr/>


    <article>
        {{$article->body}}
</article

@stop