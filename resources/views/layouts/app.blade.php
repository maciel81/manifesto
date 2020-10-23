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
            <li><a href="#concil"><i class="fas fa-biohazard"></i> manifesto</a></li>
            <li><a href="#roster"><i class="fas fa-users"></i> roster</a></li>
            <li><a href="#apply"><i class="far fa-edit"></i> apply</a></li>
            {{-- <li><a href="#guides">guias</a></li> --}}
            <li><a href="#stream"><i class="fas fa-desktop"></i> stream</a></li>
            <li><a href="#contact"><i class="far fa-envelope"></i> contato</a></li>
            <li><a href="#" class="yt"><i class="fab fa-youtube"></i> youtube</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </section>
  <!-- end hero section -->


  <!-- start concil section -->
  <section class="concil" id="concil">
    <div class="title">
      <p class="mean_title">manifesto - o conselho</p>
      <p class="sub_title">
        <em>"Na batalha, o primeiro passo para a vitória é o desejo de vencer!"</em>
      </p>
    </div>

    <!-- slider code -->
    <div class="orbit testimonial-slider-container" id="app-concil" role="region" aria-label="testimonial-slider"
      data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i
            class="fas fa-angle-left"></i></button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span><i
            class="fas fa-angle-right"></i></button>

        <!-- content slide -->
        @foreach(config('global.testimonials') as $k => $v)
        <li class="orbit-slide">
          <div class="testimonial-slide">
            <div class="grid-x grid-margin-x grid-padding-x">
              <div class="cell small-12 medium-9">
                <p class="testimonial-title">
                  "{{ $v['title'] }}"
                </p>
                <p class="testimonial-author">by <span class="author">{{ $k }}</span></p>
                <br />
                <p class="testimonial-text">{{ $v['text'] }}</p>
              </div>
              <div class="cell small-12 medium-3 align-self-middle testimonial-photo">
                <img src="{{ asset("images/{$v['photo']}.jpg") }}">
              </div>
            </div>
          </div>
        </li>
        @endforeach
        <!-- end content slide -->

      </ul>
      <nav class="orbit-bullets">
        <button class="is-active" data-slide="0">
          <span class="show-for-sr">First slide details.</span>
          <span class="show-for-sr" data-slide-active-label>Current Slide</span>
        </button>
        @for ($i = 1; $i < sizeof(config('global.testimonials')); $i++) <button data-slide="{{ $i }}"></button>
          @endfor
      </nav>
    </div>

    <!-- slider close -->

  </section>
  <!-- end concil section -->



  <!-- start roster section -->
  <section class="roster" id="roster">
    {{-- <div class="title">
      <p class="mean_title">roster</p>
      <p class="sub_title">
        <em>""</em>
      </p>
    </div> --}}
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
    {{-- @if (($break % 6) === 0)
    <div class="cell">
      <hr />
    </div>
    @endif --}}
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
</body>

</html>