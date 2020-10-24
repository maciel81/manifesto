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
            <li><a href="#concil" class="scroll"><i class="fas fa-biohazard"></i> manifesto</a></li>
            <li><a href="#roster" class="scroll"><i class="fas fa-users"></i> roster</a></li>
            <li><a href="#apply" class="scroll"><i class="far fa-edit"></i> apply</a></li>
            <li><a>|</a></li>
            <li><a href="https://www.twitch.tv/team/manifesto" target="_blank"><i class="fab fa-twitch"></i> twitch</a>
            </li>
            <li><a href="https://www.youtube.com/channel/UCN_ABXExDSgjy7jXp0s8teQ" target="_blank"><i
                  class="fab fa-youtube"></i> youtube</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </section>
  <!-- end hero section -->



  <!-- start concil section -->
  <section class="concil" id="concil">
    <div class="title">
      <p class="mean_title">o conselho</p>
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
        <button class="orbit-next"><span class="show-for-sr">Next Slide </span><i
            class="fas fa-angle-right"></i></button>

        <!-- content slide -->
        @foreach(config('global.testimonials') as $k => $v)
        <li class="orbit-slide">
          <div class="testimonial-slide">
            <div class="grid-x grid-margin-x grid-padding-x">
              <div class="cell small-12 medium-9">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="41px" height="34px"
                  viewBox="-235 240 41 34" style="enable-background:new -235 240 41 34;" xml:space="preserve">
                  <path class="quote-path" d="M-231.3,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4
                            h8.1v12.8h-14.4V260.4z" />
                  <path class="quote-path" d="M-212,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4h8.1
                            v12.8H-212V260.4z" />
                </svg>
                <p class="testimonial-title">
                  {{ $v['title'] }}
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
        <em>nossa equipe</em>
      </p>
    </div> --}}
    <div class="grid-x grid-margin-x roster_list">
      <!-- start roster list -->
      @for ($r = 0, $break=1; $r < sizeof($roster); $r++, $break++) <div class="cell small-12 medium-2 large-2">
        <img src="{{ $roster[$r]['image'] }}" alt="" title="" class="icon" />
        <p class="player">{{ $roster[$r]['name'] }}</p>
        <p class="class">{{ $roster[$r]['class'] }}</p>
        <span class="social">
          <a href="{{ $roster[$r]['social']['wow'] }}" target="_blank">
            <img class="roster_icon" src="{{ asset('images/wow.png') }}" /></a>
          <a href="{{ $roster[$r]['social']['rio'] }}" target="_blank"><img class="roster_icon"
              src="{{ asset('images/rio.png') }}" /></a>
        </span>
    </div>
    @endfor
    <!-- end roster list -->
    </div>
  </section>
  <!-- end roster section -->


  <!-- start contact section -->
  <section class="apply" id="apply">
    {{-- <div class="title">
      <p class="mean_title">Para que <span class="strong">todos</span> possam ser ouvidos.</p>
      <p class="sub_title">&nbsp;</p>
    </div> --}}
    <div class="grid-x grid-margin-x">
      <div class="cell small-12 medium-6 large-7">
        <p class="assign">Se você deseja fazer parte do nosso grupo (espero que o zeto faça um texto melhor, que
          cative
          alguém) <a href="#">clique aqui</a> e faça parte do nosso time, ou então nos deixe a sua
          mensagem de apoio
          aqui ao lado.</p>
      </div>
      <div class="cell small-12 medium-5 large-3 large-offset-1">
        <div class="translucent-form-overlay">
          <form>
            <p>É aqui mesmo</p>
            <input type="text" name="nome" placeholder="Seu nome">
            <input type="text" name="email" placeholder="Seu email">
            <textarea name="mensagem" placeholder="O que você procesa de nós?" rows="3"></textarea>
            <button type="button" class="primary button expanded warning hollow">
              É só clicar para enviar
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end apply section -->

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
  {{-- <script src="https://embed.twitch.tv/embed/v1.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
</body>

</html>