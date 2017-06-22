<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

  <!-- Styles -->
  <link href="/css/app.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/slider/nouislider.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
  </script>
  <link rel="shortcut icon" type="image/x-icon" href="/img/gopro.ico">

  <!-- Scripts -->
  <script src="/js/app.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/jquery-validation/dist/jquery.validate.js"></script>
  <script src="/jquery-validation/dist/additional-methods.js"></script>
  <script src="/jquery-validation/dist/localization/messages_id.js"></script>

</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <!-- <a class="navbar-brand" href="{{ url('/admin/home') }}"> -->
          <img src="/img/gopro.png" alt="" class="gopro" id="gopro">
        <!-- </a> -->
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="home">Beranda<span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{action('TProdukController@index')}}">Produk</a></li>
            </ul>
          </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/toko/login') }}">Login</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ ucwords('Selamat Datang ' . Auth::user()->name) }} <span class="caret"></span>
                            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ url('/toko/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                <form id="logout-form" action="{{ url('/toko/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')


  @yield('script')
</body>

</html>
