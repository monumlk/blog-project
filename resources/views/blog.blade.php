<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('home.homecss')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Hello, world!</title>
</head>

<body>
    @include('olx.header')
    <div class="container my-2">
        <h1 style="font-weight:400; margin-top:10px;color:blue;" class="services_taital">Latest Posts</h1>
        <div class="services_section_2 mt-1">
            <div  style="margin-top: 20px;" class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <h4 style="font-size:30px; padding:5px; margin-left:10px;" class="font-weight-bold text-lg mt-2">
                                {{$blog->title }}
                            </h4>
                            <div class="w-100 h-300px">
                                <img class="object-fit-cover w-80 h-100 mt-2" src="/postimage/{{ $blog->image }}">
                            </div>
                            <div class="card-body">
                                <p style="white-space: nowrap;overflow: hidden;  text-overflow: ellipsis;font-size:20px;font-weight:700">{{ str($blog->description)->limit(200) }}</p>
                                <div class="btn_main">
                                    <a href="{{ url('blogdetails', $blog->id) }}">Read More</a>
                                    <p style="font-weight:
                                    700">{{$blog->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('olx.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
