@extends('layouts.master') {{--目錄用 . --}} 

@section('content')


{{--  <form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"/>  --}}
{!! Form::model($post,['method'=>'put','action'=>['PostsController@update',$post->id] ]) !!}    

    <div class="form-group">
        {{--  <label for="title">文章標題</label>  --}}
        {!! Form::label('title', '文章標題') !!}
        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
    </div>
    

    <div class="form-group">
    {{--  <label for="fulltext">文章內容</label>  --}}
    {!! Form::label('fulltext', '文章內容') !!}
        <textarea class="form-control" name="fulltext" id="fulltext" placeholder="請輸入內容" cols="30" rows="10">{{ $post->fulltext }}</textarea>
    </div>
    

     {{--  <button type="submit" class="btn btn-primary">存檔</button>  --}}
     {!! Form::submit('修改並存檔',["class"=>"btn btn-info"]) !!}

</form>

{{--  <form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE"/>  --}}
{!! Form::open(['method'=>'delete','action'=>['PostsController@destroy',$post->id] ]) !!} 
    {{--  <button type="submit" class="btn btn-primary">刪除</button>  --}}
    {!! Form::submit('刪除',["class"=>"btn btn-primary"]) !!}

</form>

 

@endsection('content')



@section('footer')

@endsection('footer')