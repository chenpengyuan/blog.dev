
@extends('layouts.master') {{--目錄用 . --}} 

@section('content')
英霸
@if (count($imba))
  <ul>
  @foreach($imba as $hero)

    <li>{{$hero}}</li>

   @endforeach
  </ul> 
@endif    


<address>
  <strong>Twitter, Inc.</strong><br>
  1355 Market Street, Suite 900<br>
  San Francisco, CA 94103<br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
</address>

<address>
  <strong>Full Name</strong><br>
  <a href="mailto:#">first.last@example.com</a>
</address>  

@endsection('content')