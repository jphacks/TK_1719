<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>shelf</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/master.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./js/masonry.pkgd.min.js" charset="utf-8"></script>
  </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div id="app">
            </div>
        </div>
      <script src="{{ mix('js/view.js') }}" charset="utf-8"></script>
    </body>
</html>
