<div class="services_section layout_padding">
         <div class="container bg-blue-900 ">
            <h1 class="services_taital">Blog Post</h1>
            <!-- <p class="services_text">No posts here yet.</p> -->
            <div class="services_section_2">
               <div class="row">

                  @foreach($post as $post)

                  <div class="col-md-4" style="30px">
                     <div><img style="margin-bottom: 20px; height: 350px" width="350px"
                     src="/postimage/{{$post->image}}"></div>
                     <h4>{{$post->title}}</h4>
                     <p>Posted by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                  </div>

                  @endforeach
               </div>
            </div>
         </div>
      </div>