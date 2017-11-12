@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
  <div id="app">
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./js/masonry.pkgd.min.js" charset="utf-8"></script>
<script src="{{ mix('js/view.js') }}" charset="utf-8"></script>
@endsection
