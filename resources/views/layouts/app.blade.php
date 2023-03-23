<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.9.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center ">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center">
      @guest
      <h1 class="logo me-auto"><a href="{{ url('/') }}"><i class="bi bi-heart-pulse-fill"></i> Cabinet Medical</a></h1>
      @else
      <h1 class="logo me-auto"><a href="{{ url('/home') }}"><i class="bi bi-heart-pulse-fill"></i> Cabinet Medical</a>
      </h1>
      @endguest
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      @guest
      <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</span></a>

      @else
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="/patients">Patients</a></li>
          <li><a class="nav-link scrollto" href="/medecins">Medecins</a></li>
          <li><a class="nav-link scrollto" href="/medicaments">Medicaments</a></li>
          <li><a class="nav-link scrollto" href="/rdvs">Rdvs</a></li>
          <li><a class="nav-link scrollto" href="/consultations">Consultations</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="{{ route('logout') }}" class="appointment-btn scrollto"
        onclick=" event.preventDefault(); document.getElementById('logout-form').submit();"><span
          class="d-none d-md-inline">Logout</span></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      @endguest
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      @yield('content')
    </div>
  </section><!-- End Hero -->
  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <!--
Templat
e Main
JS File
 -->




  <script src="/assets/js/main.js"></script>
</body>

</html>