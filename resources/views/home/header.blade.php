
<!-- This whole section I have 0 clue what it doing here -->
<div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="services.html">Volunteer</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="contact.html">Contact</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>

            <!-- This is the header section where all available destinations are put in one place for users to go through -->
            <div class="container-fluid">
               <!-- <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div> -->
               <div class="logo">
                  <div class="fs-1">
                     <a class= "text-white " href="{{ url('/') }}">Blue Planet</a>
                  </div>
               </div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="{{ url('/') }}">Home</a></li>
                     <li><a href="{{ url('about_us') }}">About</a></li>
                      <li><a href="{{ url('blog_posts') }}">Blog</a></li>
                     <li><a href="{{ url('volunteer_posts') }}">Volunteer</a></li>
                     @if (Route::has('login'))
                     @auth
                     <li>
                     <x-app-layout>
                     </x-app-layout>
                     </li>

                     <li><a href="{{url('my_post')}}">My Post</a></li>
                     <!-- <li><a href="blog.html">Blog</a></li> -->

                     <li><a href="{{url('create_post')}}">Create Post</a></li>


                     <li><a href="{{url('my_form')}}">My Form</a></li>
                     <!-- <li><a href="blog.html">Blog</a></li> -->
                     <li><a href="{{url('create_form')}}">Create Form</a></li>
                  
                     <!-- <li><a href="{{route('home')}}">Home</a></li> -->
                     <!-- if we're logged in^, show home-->
                     @else
                     <li><a href="{{route('login')}}">Login</a></li>
                     <li><a href="{{route('register')}}">Register</a></li>
                     @endauth
                     @endif
                  </ul>
               </div>
            </div>
         </div>