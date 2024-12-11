<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.homecss')
</head>
<body>
    <div class="header_section">
        @include('home.header')
        @include('home.banner')
    </div>

    <div style="text-align: center" class="col-md-12">
        <!-- Center the image using inline CSS -->
        <div style="display: flex; justify-content: center; align-items: center; padding: 20px;">
            <img src="/postimage/{{$post->image}}" alt="Post Image" style="max-width: 100%; height: auto;">
        </div>
        <!-- Adding inline CSS to make h1 bigger -->
        <h1 style="font-size: 2.5em;"><b>{{$post->title}}</b></h1>            
        <h4>{{$post->description}}</h4>
        <p>Posted by <b>{{$post->name}}</b></p>
    </div>

    @include('home.footer')
</body>
</html>
