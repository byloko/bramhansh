<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('public/assets/img//apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('public/assets/img/logos.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <script src="https://kit.fontawesome.com/eea5ae696c.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ url('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ url('public/assets/css/paper-kit.css?v=2.2.0') }}" rel="stylesheet" />
  <link href="{{ url('public/assets/css/customStyle.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('public/assets/demo/demo.css') }}" rel="stylesheet" />
  <!-- js -->
  <script src="{{ url('public/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
</head>

<body class="landing-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand p-0" rel="tooltip" title="Coded by ShanNK" data-placement="bottom" target="_blank">
          <img alt="company-log-white" class="company-log-white" src="{{ url('public/assets/img/logo-white.png') }}"/>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#our-approach" class="nav-link">Our Approach</a>
          </li>
         
          <li class="nav-item">
            <a href="#about-us" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#media-recogonition" class="nav-link">Media Recogonition</a>
          </li>
          <li class="nav-item">
            <a href="#contact-us" class="nav-link">Let's Connect</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  @yield('content')
  <footer class="footer   footer-white ">
    <div class="container">
      <div class="row">
        <div class="credits ml-auto">
          <span>
            <script>
              document.write(new Date().getFullYear())
            </script>, designed by Shashank
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ url('public/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('public/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('public/assets/js/plugins/bootstrap-switch.js') }}"></script>
  <script src="{{ url('public/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('public/assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ url('public/assets/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <script src="{{ url('public/assets/js/paper-kit.js?v=2.2.0') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-8BCJY98RB9');
  </script>
</body>

</html>
