@extends('layouts.master') {{--目錄用 . --}} 

@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{  $post->fulltext }}</p>

    <hr />
    <a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}">修改</a>


@endsection('content')



@section('footer')

@endsection('footer')