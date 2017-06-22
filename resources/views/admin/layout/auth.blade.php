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
</head>

<body>


  @yield('content')

  <!-- Scripts -->
  <script src="/js/app.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>

  @yield('script')
</body>

</html>
