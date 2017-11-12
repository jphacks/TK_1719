@extends('layouts.app')

@section('content')
  @foreach($collections as $collection)
    {{ $collection->title }}:{{ $collection->id }}
  @endforeach
@endsection
