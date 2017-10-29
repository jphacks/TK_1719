<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
  <meta charset="utf-8">
  <title>shelf</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/master.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./js/masonry.pkgd.min.js" charset="utf-8"></script>
  </head>
    <body>
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif -->

            <div id="app">
                <router-view></router-view>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.js" charset="utf-8"></script>
        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
