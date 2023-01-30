<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Bedraj Blog</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- AOS library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    
    <!-- {{-- Bootstrap --}} -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></head>  -->

    <!--  Tailwind CDN  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css">  -->
  </head>
  <body>
    <div id="wrapper">
      <!-- header -->
      @yield('header')

      <!-- sidebar -->
      <div class="sidebar">
        <span class="closeButton">&times;</span>
        <!-- <img src="images/image.jpeg" class="hello"> -->
        <p class="brand-title"><i class="fas fa-vihara"></i><a href="{{route('blog.index')}}">Ramgram </a></p>

        <div class="side-links">
          <ul>
            <li><a class="{{Request::routeIs('welcome.index') ? 'active' :'' }}" href="{{route('welcome.index')}}">Home</a></li>
            <li><a class="{{Request::routeIs('blog.index')? 'active' :''}}" href="{{route('blog.index')}}">Blog</a></li>
            <li><a class="{{Request::routeIs('About')? 'active' :''}}" href="{{route('about')}}">About</a></li>
            <li><a class="{{Request::routeIs('contact.index')? 'active' :''}}" href="{{route('contact.index')}}">Contact</a></li>

            @guest
            <li><a class="{{Request::routeIs('login')? 'active' :''}}" href="{{route('login')}}">Login</a></li>
            <li><a class="{{Request::routeIs('register')? 'active' :''}}" href="{{route('register')}}">Register</a></li>
            @endguest
            @auth
            <li><a class="{{Request::routeIs('dashboard')? 'active' :''}}" href="{{route('dashboard')}}">dashboard</a></li>
            @endauth
          
          </ul>
        </div>

        <!-- sidebar footer -->
        <footer class="sidebar-footer">
        <div>
            <a href="https://www.facebook.com/vedraj.chaudhary"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com/chaudharyvedraj?igshid=NTA5ZTk1NTc="><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@bedrajchaudhary5777"><i class="fab fa-youtube"></i></a>
          </div>
          

          <small>&copy 2023 Bedraj Paximaha Blog</small>
          <div>
          <a href="{{route('about')}}"><img src="images/bedraj.jpeg" class="hello"></a>
          </div>
        </footer>
      </div>
      <!-- Menu Button -->
      <div class="menuButton">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>

      <!-- main -->
      @yield('main')
      <div class="container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.0755844083014!2d83.6809918!3d27.4980247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399423ff1a09bcef%3A0xe3dfa5379f668f5c!2sRamagrama%20Relic%20Stupa%20(%20Buddha%20)!5e0!3m2!1sen!2sin!4v1674810896683!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <!-- Main footer -->
      <footer class="main-footer">
      
        <div>
        <h3>follow me</h3>
        </div>
       
      <div>
            <a href="https://www.facebook.com/vedraj.chaudhary"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com/chaudharyvedraj?igshid=NTA5ZTk1NTc="><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@bedrajchaudhary5777"><i class="fab fa-youtube"></i></a>
          </div>
          <small>&copy 2023 Bedraj Paximaha Blog</small>
        
        
        </footer>
      </div>

   <!-- Click events to menu and close buttons using javaascript-->
    <script>
      document
        .querySelector(".menuButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "100%";
          document.querySelector(".sidebar").style.zIndex = "5";
        });

      document
        .querySelector(".closeButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "0";
        });
    </script>

    <!-- Cards animations -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 400,
        duration: 3000,
      });
      document
        .querySelectorAll("img")
        .forEach((img) => img.addEventListener("load", () => AOS.refresh()));
    </script>
    <script>
                        CKEDITOR.replace( 'body' );
                </script>
  </body>
</html>

