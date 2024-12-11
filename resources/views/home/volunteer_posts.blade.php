<!DOCTYPE html>
<html lang="en">
   <head>
        @include('home.homecss')
   </head>
   <body>
      <div class="header_section">
        @include('home.header')
        <!-- @include('home.banner') -->
      </div>

      <!-- search and make -->
 <!-- Navbar Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <!-- <a class="nav-link active" aria-current="page" href="#">submit your own form</a> -->
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another Action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                </ul>
              </li> -->
          </ul>
          <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
    </div>
  </nav>

      
      <!-- Volunteer Forms Section -->
      <div class="services_section layout_padding">
         <div class="container bg-light">
            <h1 class="services_taital">Volunteer Forms</h1>
            <div class="services_section_2">
               <div class="row">
                  <!-- Loop through volunteer forms -->
                  @foreach($forms as $form)
                  <div class="col-md-4 mb-4">
                     <div class="card" style="width: 100%;">
                        <div class="card-body">
                           <h4 class="card-title">{{ $form->name }}</h4>
                           <p class="card-text">{{ $form->description }}</p>
                           <p class="card-text"><b>Created By:</b> {{ $form->creator }}</p>
                           <a href="{{ $form->link }}" class="btn btn-primary" target="_blank">View Form</a>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>

      @include('home.footer')
   </body>
</html>
