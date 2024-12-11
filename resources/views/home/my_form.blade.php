<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic styling -->
      <style type="text/css">

        .post_design{
            padding: 30px;
            text-align: center;
            background-color: #06402B;
            margin-bottom: 20px;
            border-radius: 8px;
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
            max-width: 100%;
            max-height: 400px;
            width: auto;
            height: auto;
            display: block;
            margin: auto;
        }

        .btn-container {
            margin-top: 15px;
        }

        .btn-container a {
            margin-right: 10px;
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
        
        @foreach($forms as $form) <!-- Assuming $forms contains the form data -->
            <div class="post_design">
                <!-- Display image if available -->
                @if($form->image)
                    <img class="img_design" src="/postimage/{{$form->image}}" alt="Form Image">
                @endif
                
                <h3 class="title_design">{{$form->name}}</h3> <!-- Display form name -->
                <p class="p_design">{{$form->description}}</p> <!-- Display form description -->
                <p class="p_design"><b>Created By:</b> {{$form->creator}}</p> <!-- Display creator -->
                <p class="p_design"><b>Status:</b> {{$form->status}}</p> <!-- Display status -->

                <!-- Buttons for updating and deleting the form -->
                <div class="btn-container">
                    <a onclick="return confirm('Are you sure you want to delete this form?')" href="{{url('deleteForm', $form->id)}}" class="btn btn-danger">Delete</a>
                    <a href="{{url('updateForm', $form->id)}}" class="btn btn-primary">Update</a>
                </div>
            </div>
        @endforeach

      </div>

        @include('home.footer')
   </body>
</html>
