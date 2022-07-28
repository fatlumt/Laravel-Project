<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Boutique
        </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   <!-- Additional CSS Files -->
   <link rel="stylesheet" type="text/css" href="{{ asset('web_page_assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="a{{ asset('web_page_assets/scss/font-awesome.css') }}') }}">

<link rel="stylesheet" href="{{ asset('web_page_assets/css/templatemo-hexashop.css') }}">

<link rel="stylesheet" href="{{ asset('web_page_assets/css/owl-carousel.css') }}">

<link rel="stylesheet" href="{{ asset('web_page_assets/css/lightbox.css') }}">  <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
    </head>
    <style>
        /* Color of the links BEFORE scroll */
.navbar-scroll .nav-link,
.navbar-scroll .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  color: #262626;
}

/* Color of the navbar BEFORE scroll */
.navbar-scroll {
  background-color: #FFC017;
}

/* Color of the links AFTER scroll */
.navbar-scrolled .nav-link,
.navbar-scrolled .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  color: #262626;
}

/* Color of the navbar AFTER scroll */
.navbar-scrolled {
  background-color: #fff;
}

/* An optional height of the navbar AFTER scroll */
.navbar.navbar-scroll.navbar-scrolled {
  padding-top: auto;
  padding-bottom: auto;
}
.navbar-brand {
  font-size: unset;
  height: 3.5rem;
}

    </style>
    <body>    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    
   <!-- Navbar -->

<header class="header-area fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1 class="bg-dark logo"> Shop</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}" class="active">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('cart') }}">Cart({{ count(\Cart::getContent()) }})</a></li>
                         
                          
                            <div >                                                            
                            @if (Route::has('login'))
                                         <div class="scroll-to-section">
                                             @auth
                                             <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                <i class="fa-solid fa-face-smile">{{ Auth::user()->name }}</i> 

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            

                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                            
                                        <x-jet-dropdown-link href="{{ url('/dashboard') }}" 
                                            class="dropdown-item">   {{ __('Dashboard') }}</x-jet-dropdown-link>

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                        @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                                                    </div>

                                    <!-- Hamburger -->
                                    <!-- <div class="-mr-2 flex items-center sm:hidden">
                                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div> -->

                                        @else
                                        <x-jet-dropdown>
                                        <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    <i class="fa-solid fa-face-smile"></i>

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                                        </x-slot>
                                        <x-slot name="content" class=" d-flex">
                                        <x-jet-dropdown-link>  <li class="m-auto p-auto d-grid gap-0"><a href="{{ route('login') }}" class="scroll-to-section m-0 p-0"> Login </a></li></x-jet-dropdown-link>
                                             @if (Route::has('register'))
                                             <x-jet-dropdown-link><li><a href="{{ route('register') }}" class="scroll-to-section">Register</a></li></x-jet-dropdown-link>
                                             </x-slot>
                                                        </x-jet-dropdown>
                                                @endauth             
                                                  @endif       

                                               
                                              </div>
                                          
                                        @endif
                            
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
<!-- Navbar end -->
<hr>
<div>

@yield('content')
</div>
 <!-- ***** Footer Start ***** -->
 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{ asset('web_page_assets/images/l.png') }}" alt="">
                        </div>
                        <ul>
                            <li><a href="#">Prizren Kosovo</a></li>
                            <li><a href="#">info@company.com</a></li>
                            <li><a href="#">00 383 49/44/43 000 111</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 All Rights Reserved. 
                        
                        <br>Design: <a href="" target="_parent" title="free css templates">F.TH</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    
    <script src="{{ asset('web_page_assets/js/jquery-2.1.0.min.js') }}"></script>
    <!-- Bootstra -->
    <script src="{{ asset('web_page_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/popper.js') }}"></script>
  
    <!-- Plugins \-->
    <script src="{{ asset('web_page_assets/js/accordions.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web_page_assets/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('web_page_assets/js/slick.js') }}"></script> 
    <script src="{{ asset('web_page_assets/js/lightbox.js') }}"></script> 
    <script src="{{ asset('web_page_assets/js/isotope.js') }}"></script> 
 
    <!-- Global ') }} -->
    <script src="{{ asset('assets/js/custom.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

        function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);
    </script>
    </body> 
    

</html>
