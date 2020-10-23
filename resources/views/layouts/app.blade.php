<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 8]><html class="lt-ie9" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" dir="ltr"> <![endif]-->
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('global.title') }}</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

  <!-- start hero section -->
  <section class="hero">
    <header>
      <nav class="top-bar">
        <div class="top-bar-left">
          <ul class="menu">
            <li class="menu-text"></li>
          </ul>
        </div>
        <div class="top-bar-right" id="mean_nav">
          <ul class="vertical medium-horizontal menu menu-links">
            <li><a href="#concil">concelho</a></li>
            <li><a href="#roster">roster</a></li>
            <li><a href="#guides">guias</a></li>
            <li><a href="#apply">apply now</a></li>
            <li><a href="#streams"><i class="fas fa-tv"></i> streams</a></li>
            <li><a href="#" class="yt"><i class="fab fa-youtube"></i> youtube</a></li>
            <li><a href="#contact"><i class="fas fa-envelope"></i> contato</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </section>
  <!-- end hero section -->


  <!-- start concil section -->
  <section class="concil" id="concil">
    <div class="title">
      <p class="mean_title">concelho</p>
      <p class="sub_title">
        <em>"Na batalha, o primeiro passo para a vitória é o desejo de vencer!"</em>
      </p>
    </div>
  </section>
  <!-- end concil section -->



  <!-- start roster section -->
  <section class="roster" id="roster">
    <div class="title">
      <p class="mean_title">roster</p>
      <p class="sub_title">
        <em>""</em>
      </p>
    </div>
    <div class="grid-x grid-margin-x roster_list">
      <!-- start roster list -->
      @for ($r = 0, $break=1; $r < sizeof($roster); $r++, $break++) <div class="cell small-6 medium-4 large-2">
        <img src="{{ $roster[$r]['image'] }}" alt="" title="" />
        <p class="player">{{ $roster[$r]['name'] }}</p>
        <p class="class">{{ $roster[$r]['class'] }}</p>
        <span class="social">
          <a href="{{ $roster[$r]['social']['wow'] }}" target="_blank">
            <img class="roster_icon" src="{{ asset('images/wow.png') }}" /></a>
          <a href="{{ $roster[$r]['social']['rio'] }}" target="_blank"><img class="roster_icon"
              src="{{ asset('images/rio.png') }}" /></a>
        </span>
    </div>
    @if (($break % 6) === 0)
    <div class="cell">
      <hr />
    </div>
    @endif
    @endfor
    <!--    End Roster List    -->
    </div>
  </section> <!-- end roster section -->


  <!-- start btn : back to top -->
  <a href="#" class="btn_fancy" id="back_top">
    <div class="solid_layer"></div>
    <div class="border_layer"></div>
    <div class="text_layer"><img src="{{ asset('images/top_arrow.png') }}" alt="Back to top" title="" class="top_arrow">
    </div>
  </a>
  <!-- end btn: back to top -->

  <!-- include scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
    integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ=="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"
    integrity="sha512-BLT+loVwmqdzlGIU9gxbSpRUwhs9I1uWkNkdAJEUM82s337R9T0pBk007MwaJjVTGhOHsovV4y6o/IwscSAglw=="
    crossorigin="anonymous"></script>

</body>

</html>