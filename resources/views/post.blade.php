
@extends('layouts.master')

@section('content')

<p>POST 分類:{{$category}}</p>
<p>POST 日期:{{$date}}</p>
<p>POST  ID :{{$id}}</p>
    

@endsection('content')

@section('footer')

<script>
    console.log('{{$category}} {{$date}} {{$id}}')
</script>
    

@endsection('footer')
