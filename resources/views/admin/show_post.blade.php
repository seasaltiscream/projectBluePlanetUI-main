<!DOCTYPE html>
<html>
  <head> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css ')

    <style type="text/css">

        .title_design {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .table_design {
            width: 95%; /* Increased table width */
            margin: 0 auto; /* Center the table */
            border-collapse: collapse; /* Remove double borders */
            border: 1px solid white; /* Table border */
            text-align: center; /* Center text */
        }

        .table_design th, .table_design td {
            padding: 15px; /* Increased padding for clearer separation */
            border: 1px solid #dddddd; /* Border between cells */
            vertical-align: middle; /* Align text vertically in the middle */
        }

        .table_design td {
            word-wrap: break-word; /* Wrap long text */
        }

        .tHeader_design {
            background-color: skyblue; /* Header background color */
        }

        .table_design tr {
            transition: background-color 0.5s ease; /* Smooth hover effect */
        }

        .table_design tr:hover {
            background-color: #e9ecef; /* Hover effect */
        }

        .img_design {
            height: 100px;
            width: 100px; /* Updated image size to be square */
            padding: 10px;
            object-fit: cover; /* Ensure images fit within the box without stretching */
        }

        .title_column {
            width: 20%; /* Set a width for the title column */
        }

        .description_column {
            width: 40%; /* Set a width for the description column */
            text-align: left; /* Align description to the left */
        }

        .posted_by_column, 
        .status_column,
        .user_column {
            width: 10%; /* Set width for other columns */
        }

        .img_column {
            width: 10%;
        }


    </style>

  </head>
  <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            @if(session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
            @endif

            <h1 class="title_design">All Post</h1>
        <table class="table_design">
            <tr class="tHeader_design">
                <th class="title_column">Post Title</th>
                <th class="description_column">Description</th>
                <th class="posted_by_column">Posted by</th>
                <th class="status_column">Post Status</th>
                <th class="user_column">User</th>
                <th class="img_column">Image</th>
                <th>Delete Post</th>
                <th>Edit Post</th>
                <th>Status Accept</th>
                <th>Status Reject</th>
            </tr>
        @foreach($post as $post)
            <tr>
                <td class="title_column">{{$post->title}}</td>
                <td class="description_column">{{$post->description}}</td>
                <td class="posted_by_column">{{$post->name}}</td>
                <td class="status_column">{{$post->post_status}}</td>
                <td class="user_column">{{$post->userType}}</td>
                <td class="img_column">
                    <img class="img_design" src="postimage/{{$post->image}}">
                </td>
                <td>
                    <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    <!-- will call the function at line 127, script, function -->
                </td>
                <td>
                    <a href="{{url('edit_post', $post->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Are you sure to accept this post?')" href="{{url('accept_post', $post->id)}}" class="btn btn-outline-secondary">Accept</a>
                </td>
                <td>
                    <a onclick="return confirm('Are you sure to reject this post?')" href="{{url('reject_post', $post->id)}}" class="btn btn-primary">Reject</a>
                </td>
            </tr>
        @endforeach
        </table>


        </div>
        @include('admin.footer')

        <script type="text/javascript">

        function confirmation(ev){
            ev.preventDefault();
            // prevent the data that we want to delete to be deleted asap bcoz we want the confirmation first
            var urlToRedirect=ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            // will store the url into the var (line 116)
            swal({
                title:"Are you sure to delete this post?" , 
                text: "You won't be able to revert this deletion" , 
                icon:"warning" ,
                buttons: true ,
                dangerMode: true
            })

            .then((willCancel)=>
            {
                if(willCancel){
                    window.location.href=urlToRedirect;
                }
            });

        }

        </script>

  </body>
</html>