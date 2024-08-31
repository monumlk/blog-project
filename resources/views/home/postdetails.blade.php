<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .services_img {
            margin-top: 20px;
        }
    </style>
    <base href="/public">
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
    </div>
    <div class="col-md-8 mx-auto">
        <div><img src="/postimage/{{ $post->image }}" class="services_img "></div>
        <h4 class="text-center font-weight-bold text-xl">{{ $post->title }}</h4>
        <p class="text-lg text-justify mb-4">{{ $post->description }}</h5>
        <p>Post by{{ $post->name }}</p>
    </div>


    @include('home.footer')
</body>

</html>
