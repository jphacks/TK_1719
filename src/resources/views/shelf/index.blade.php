@extends('layouts.app')

@section('content')
  @foreach($shelves as $shelf)
    {{ $shelf->name }}:{{$shelf->id}}
  @endforeach
@endsection
