<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
       <style type="text/css">

        .post_design{
            padding: 30px;
            text-align: center;
            background-color: #06402B;
        }

        .title_design{
            color: white;
            font-weight: bold;
            padding: 15px;
            font-size: 30px;
        }

        .p_design{
            color: whitesmoke;
            font-weight: bold;
            padding: 15px;
            font-size: 17px;
        }

        .img_design{
            max-width: 100%;  /* Responsive width */
            max-height: 400px; /* Limit the height */
            width: auto;
            height: auto;
            display: block;
            margin: auto;      /* Center the image */
        }

       </style>

        @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
        @endif
        
        @foreach($data as $data)
            <div class="post_design">
                <img class="img_design" src="/postimage/{{$data->image}}">
                <h3 class="title_design">{{$data->title}}</h3>
                <p class="p_design">{{$data->description}}</p>
                <a onclick="return confirm('Are you sure to delete this?')" href="{{url('deleteUserPost', $data->id)}}" class="btn btn-danger">Delete Post</a>
                <a href="{{url('update_user_post', $data->id)}}" class="btn btn-primary">Update</a>
            </div>
        @endforeach

      </div>

        @include('home.footer')
   </body>
</html>
