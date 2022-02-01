<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Shift APPens</title>
        <link rel="shortcut icon" type="image/png" href="/images/shift18/favicon.png"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/partners.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,800" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <script defer type="text/javascript" src="js/website18.js" ></script>
        <meta property="og:url"  content="https://shiftappens.com/" />
        <meta property="og:type" content="website" />
        <meta property="og:title"  content="Shift APPens" />
        <meta property="og:description"  content="Shift APPens is a technological event, where the goal is to create an app in 48 hours. This event gathers students from several technological areas, as well as entrepreneurs and high tech enthusiasts! " />
        <meta property="og:image"  content="https://shiftappens.com/images/shift18/sa-share.jpg" />
        <meta property="og:image:alt" content="Shift APPens" />

        <script>
          $(document).ready(function() {
            var images = ['1.JPG', '2.JPG', '3.JPG', '4.JPG', '5.JPG'];
            var imageString;

            imageString = "/images/shift18-ss/" + images[Math.floor(Math.random() * images.length)];
            //console.log(imageString);
            document.getElementById('slideshowID').style.backgroundImage="url(" + imageString + ")";
          });
        </script>


    </head>

    <body id="top">

      <div class="slideshow-hero">
        <div class="slideshow" id="slideshowID"></div>

        <div class="slideshow-overlay"></div>

        <section id="section-hero" class="hero is-fullheight section-text">
          <div class="hero-head has-text-centered">
            <br>
            <h1 class="title is-3 hero-date" style="color: black !important;"><strong>20, 21 & 22 April - Coimbra<br>Pavilhão Dr. Mário Mexia</strong></h1>
          </div>
          <div class="hero-body">
            <div class="container has-text-centered" style="display:flex; flex-direction:column;align-items:center;">
              <img src="{{ asset('images/shift18/logo-text.svg')}}"  class="logo-hero" style="margin-bottom:42px;">
              <a href='{{ url('auth/login') }}' class="button is-black">Apply now!</a>
            </div>
          </div>
          <div class="arrow-position">
            <a href="#contact">
              <div class="arrow bounce" style="margin-left: 10px;"></div>
            </a>
          </div>
        </section>
      </div>

      <div class="navbar-issue-fix">
        <nav class="navbar" id="navbar" role="navigation" aria-label="main navigation" style="z-index: 10; ">
          <div class="navbar-brand" style="margin-right: 30px;">
            <a class="navbar-item" href="#top">
              <h1 class="mopster" style="margin-right: 2px; color: black; box-sizing: border-box;">Shift Appens</h1>
            </a>

            <div class="burger navbar-burger" id="burger" onclick="toggleBurger()">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div class="navbar-menu">
            <div class="navbar-start" id="navbar-nav">
              <a class="navbar-item" href="#section-what">
                WHAT
              </a>
              <a class="navbar-item mobile-nav" href="#section-whenwhere">
                WHEN & WHERE
              </a>
              <a class="navbar-item" href="#section-partners">
                PARTNERS
              </a>
              <a class="navbar-item mobile-nav" href="#section-prizes">
                PRIZES
              </a>
              <a class="navbar-item mobile-nav" href="#section-juri">
                JURI
              </a>
              <a class="navbar-item mobile-nav" href="#section-who">
                SCHEDULE
              </a>
              <a class="navbar-item mobile-nav" href="#section-us">
                US
              </a>
              <a class="navbar-item mobile-nav" href="#section-past">
                PAST
              </a>
            </div>
            <div class="navbar-end">
              <a href="https://twitter.com/ShiftAPPens" target="_blank" class="navbar-item">
                <img src="{{ asset('images/shift18/twitter.svg')}}"style="width: 20px;">
              </a>
              <a href="https://www.facebook.com/whereshiftappens/" target="_blank" class="navbar-item">
                <img src="{{ asset('images/shift18/facebook.svg')}}" style="width: 20px;">
              </a>
              <a href="https://www.instagram.com/shiftappens/?hl=pt" target="_blank" class="navbar-item">
                <img src="{{ asset('images/shift18/instagram.svg')}}" style="width: 20px;">
              </a>
              <a href="https://www.linkedin.com/company-beta/22350397" target="_blank" class="navbar-item">
                <img src="{{ asset('images/shift18/linkedin.svg')}}" style="width: 20px;">
              </a>
              <a href="https://medium.com/@shiftappens" target="_blank" class="navbar-item">
                <img src="{{ asset('images/shift18/medium.svg')}}" style="width: 20px;">
              </a>
              <!--
              <div class="navbar-item">
                <a href='{{ url('auth/login') }}' class="button is-black">Login</a>
              </div>
              -->
            </div>
          </div>
        </nav>
      </div>

      <main>
        @yield('content-join')
        @yield('content-what')
        @yield('content-when-where')
        @yield('content-partners')
        @yield('content-prizes')
        @yield('content-contact')
        @yield('content-juri')
        @yield('content-who')
        @yield('content-faq')
        @yield('content-us')
        @yield('content-past')
      </main>

      <footer class="footer">
        <div class="container footer-container">
          <div class="has-text-centered">
            <p class="subtitle is-6" style="margin-top: 9px;">
              © Shift APPens 2018
            </p>
          </div>
          <div class="has-text-centered footer-logos" style="margin-top: 8px;">
            <a href="https://twitter.com/ShiftAPPens" target="_blank">
              <img src="{{ asset('images/shift18/twitter.svg')}}" style="margin-left: 20px; width: 20px;">
            </a>
            <a href="https://www.facebook.com/whereshiftappens/" target="_blank">
              <img src="{{ asset('images/shift18/facebook.svg')}}" style="width: 20px; margin-left: 10px;">
            </a>
            <a href="https://www.instagram.com/shiftappens/?hl=pt" target="_blank">
              <img src="{{ asset('images/shift18/instagram.svg')}}" style="width: 20px; margin-left: 10px;">
            </a>
            <a href="https://www.linkedin.com/company-beta/22350397" target="_blank">
              <img src="{{ asset('images/shift18/linkedin.svg')}}" style="width: 20px; margin-left: 10px;">
            </a>
            <a href="https://medium.com/@shiftappens" target="_blank">
              <img src="{{ asset('images/shift18/medium.svg')}}" style="width: 20px; margin-left: 10px;">
            </a>
          </div>
        </div>
      </footer>
      <script type="text/javascript" src="js/flooper-minified.js"></script>
      <script type="text/javascript" src="slick/slick.min.js"></script>
      <script type="text/javascript" src="js/slick.js"></script>
      <script type="text/javascript" src="js/flooper-script.js"></script>
	    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
      <script type="text/javascript" src="js/about.js"></script>
      <script type="text/javascript" src="js/timer.js"></script>
    </body>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114719280-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114719280-1');
    </script>
</html>

<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
