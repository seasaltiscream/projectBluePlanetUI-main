<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
        <style type="text/css">

            .div_design{
                text-align: center;
                padding: 70px;
                background-color: #000000;
            }

            .img_adjustment{
            max-width: 100%;  /* Responsive width */
            max-height: 400px; /* Limit the height */
            width: auto;
            height: auto;
            display: block;
            margin: auto;
            }

            label{
                font-size: 20px;
                font-weight: bold;
                width: 200px;
                color: white;
            }

            .input_design{
                padding: 30px;
            }

            .title_design{
                padding: 30px;
                font-size: 30px;
                font-weight: bold;
                color: white;
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

        <div class="div_design">
            <h1 class="title_design">Update Post</h1>
            <form action="{{url('update_postData', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_design">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="input_design">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="input_design">
                    <label>Current Image</label>
                    <img class="img_adjustment" src="/postimage/{{$data->image}}">
                </div>
                <div class="input_design">
                    <label>Updated Image</label>
                    <input type="file" name="image">
                </div>
                <div class="input_design">
                    <input type="submit" name="" class="btn btn-outline-secondary">
                </div>
            </form>
        </div>
      </div>

       @include('home.footer')
</html>