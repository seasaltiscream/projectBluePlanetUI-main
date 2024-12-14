<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      <!-- basic -->
      <style type="text/css">
          .div_design {
              text-align: center;
              padding: 70px;
              background-color: #000000;
          }

          .img_adjustment {
              max-width: 100%;  /* Responsive width */
              max-height: 400px; /* Limit the height */
              width: auto;
              height: auto;
              display: block;
              margin: auto;
          }

          label {
              font-size: 20px;
              font-weight: bold;
              width: 200px;
              color: white;
          }

          .input_design {
              padding: 30px;
          }

          .title_design {
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
        
        <!-- Confirmation message for update -->
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
        @endif
        
        <!-- post fields -->
        <div class="div_design">
            <h1 class="title_design">Update Post</h1>
            <form action="{{url('update_postData', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_design">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}" required>
                </div>

                <div class="input_design">
                    <label>Description</label>
                    <textarea name="description" required>{{$data->description}}</textarea>
                </div>

                <!-- Display current thumbnail (image or YouTube) -->
                <div class="input_design">
                    <label>Current Thumbnail</label>
                    <!-- Check if there's a video link -->
                    @if($data->video_link)
                        <!-- If there's a YouTube link, display its thumbnail -->
                        <img class="img_adjustment" src="{{$data->thumbnail}}" alt="YouTube Thumbnail">
                    @elseif(!empty($data->image) && file_exists(public_path('postimage/' . $data->image)))
                        <!-- If image is uploaded, display it -->
                        <img class="img_adjustment" src="/postimage/{{$data->image}}" alt="Post Image">
                    @else
                        <!-- If neither exists, show the default thumbnail -->
                        <img class="img_adjustment" src="/defaultThumbnail/defaultThumbnail.jpg" alt="Default Thumbnail">
                    @endif
                </div>

                <!-- Option to upload a new image -->
                <div class="input_design">
                    <label>Updated Image</label>
                    <input type="file" name="image">
                </div>

                <!-- YouTube Link Field -->
                <div class="input_design">
                    <label>YouTube Link (if applicable)</label>
                    <input type="text" name="video_link" value="{{$data->video_link}}">
                    @if($data->video_link)
                        <!-- Button to delete the YouTube link -->
                        <a href="{{ url('delete_youtube_link/'.$data->id) }}" class="btn btn-danger">Delete YouTube Link</a>
                    @endif
                </div>

                <div class="input_design">
                    <input type="submit" class="btn btn-outline-secondary" value="Update Post">
                </div>
            </form>
        </div>
      </div>
      <!-- post fields -->

      @include('home.footer')
   </body>
</html>
