<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/platform-css/style.css">
  <link rel="stylesheet" href="/css/platform-css/bulma.css">
  <link rel="stylesheet" href="/js/taggle/taggle.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,800" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <title>Shift APPens</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <meta property="og:url"  content="https://shiftappens.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:title"  content="Shift APPens" />
  <meta property="og:description"  content="Shift APPens is a technological event, where the goal is to create an app in 48 hours. This event gathers students from several technological areas, as well as entrepreneurs and high tech enthusiasts! " />
  <meta property="og:image"  content="https://shiftappens.com/images/shift18/sa-share.jpg" />
  <meta property="og:image:alt" content="Shift APPens" />

  <link rel="shortcut icon" type="image/png" href="/images/shift18/favicon.png"/>
</head>

<body>
    <script src="/js/taggle/jquery-1.10.1.js"></script>
    <script src="/js/taggle/jquery-ui.js"></script>
    <script src="/js/taggle/taggle.min.js"></script>
    <script src="/js/taggle/scripts.js"></script>
    <script>
        const toggleBurger = () => {
            document.querySelector('.navbar-menu').classList.toggle('is-active');
            $(document).ready(function() {
                $("#navbar-nav a").click(function(e) {
                    var isActive = $(this).hasClass('is-active');
                    $('.is-active').removeClass('is-active');
                    if (!isActive) {
                        $(this).addClass('is-active');
                    }
                });
            });
        };
    </script>

    <nav class="navbar" id="navbar" role="navigation" aria-label="main navigation" style="z-index: 10; ">
        <div class="navbar-brand" style="margin-right: 30px; margin-left: 30px;">
            <a class="navbar-item" href="#top">
                <h1 class="mopster" style="margin-right: 2px; color: black; box-sizing: border-box">
                  Shift Appens
                </h1>
            </a>

            <div class="burger navbar-burger" id="burger" onclick="toggleBurger()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start" id="navbar-nav">
              @include ('layouts.components.navbar_item', [
                'url' => url('platform'), 'text' => 'DASHBOARD'
              ])

              @include ('layouts.components.navbar_item', [
                'url' => url('platform/applications'), 'text' => 'APPLICATION', 'class' => 'mobile-nav'
              ])

              @include ('layouts.components.navbar_item', [
                'url' => url('platform/user'), 'text' => 'PROFILE', 'class' => 'mobile-nav'
              ])

              @include ('layouts.components.navbar_item', [
                'url' => url('platform/shifters'), 'text' => 'SHIFTERS', 'class' => 'mobile-nav'
              ])

              @include ('layouts.components.navbar_item', [
                'url' => url('platform/teams'), 'text' => 'TEAMS', 'class' => 'mobile-nav'
              ])

              @if (Auth::user()->isAdmin())
                @include ('layouts.components.navbar_item', [
                  'url' => url('platform/users'), 'text' => 'USERS', 'class' => 'mobile-nav'
                ])


                @include ('layouts.components.navbar_item', [
                  'url' => url('platform/partners'), 'text' => 'PARTNERS', 'class' => 'mobile-nav'
                ])
              @endif

                @include ('layouts.components.navbar_item', [
                  'url' => url('platform/contests'), 'text' => 'CONTESTS', 'class' => 'mobile-nav'
                ])
              @include ('layouts.components.navbar_item', [
                'url' => url('/'), 'text' => '2018', 'class' => 'mobile-nav'
              ]) 
            </div>

            <div class="navbar-end">
              @include('layouts.components.navbar_item', [
                'url' => url('auth/logout'), 'text' => 'LOG OUT', 'class' => 'mobile-nav'
              ])
            </div>
        </div>
    </nav>

     <div class="dash-content">
        @if(session('status') != null && session('status') == 'success' && isset($success_message))
            <div id="alert-sucess" class="alert success">
                {{ $success_message }}
                <span class="close-button" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @elseif(!$errors->isEmpty())
            <div id="alert-error" class="alert error">
                Ops! There has been a mistake, please try again!
                <span class="close-button" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif
    </div>
    @yield('content')

    <script>
      $('#bio').click( function() {
        $("#pitch-section").addClass("invisible");
        $("#more-section").addClass("invisible");
        $("#bio-section").removeClass("invisible");
        $("#bio-section").addClass("visible");

        $("#bio").addClass("is-active");
        $("#pitch").removeClass("is-active");
        $("#more").removeClass("is-active");
      } );

      $('#pitch, #bio-button').click( function() {
        $("#bio-section").addClass("invisible");
        $("#more-section").addClass("invisible");
        $("#pitch-section").removeClass("invisible");
        $("#pitch-section").addClass("visible");

        $("#pitch").addClass("is-active");
        $("#bio").removeClass("is-active");
        $("#more").removeClass("is-active");
      } );

      $('#more, #pitch-button').click( function() {
        $("#pitch-section").addClass("invisible");
        $("#bio-section").addClass("invisible");
        $("#more-section").removeClass("invisible");
        $("#more-section").addClass("visible");

        $("#more").addClass("is-active");
        $("#pitch").removeClass("is-active");
        $("#bio").removeClass("is-active");
      } );

      $('input[name ="isStudent"]').change(function() {
        if($(this).val() == 1){
          $('.student').removeClass('invisible');
          $('.not-student').addClass('invisible');
        }
        else {
          $('.student').addClass('invisible');
          $('.not-student').removeClass('invisible');
        }
      });
    </script>

    @yield('footer')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114719280-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114719280-1');
    </script>
</body>

</html>
