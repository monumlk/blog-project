<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('home.homecss')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
</head>

<body>
    {{-- header --}}
    <div class="container mt-2">
        <div class="row bg-light p-2">
            <div class="col-md-2">
                <a href="{{ route('olx') }}">
                    <img src="{{ asset('images/logo.png') }}" style="width: 60px;"
                        alt="{{ config('app.name') }} Logo" />
                </a>
            </div>
            <div class="col-md-4">
                <div>
                    <form action="/search">
                        <div class="input-group flex-nowrap">
                            <input type="text" name="query" class="form-control search-form" placeholder="Search"
                                aria-label="Username" aria-describedby="addon-wrapping">
                            <button type="submit" class="input-group-text" id="addon-wrapping"><a href="/"><i
                                        class="fa-solid fa-magnifying-glass"></i></a></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                @auth
                    <x-app-layout />
                @endauth
            </div>
            <div class="col-md-2">
                @if (request()->is('post_details/*'))
                    <a href="http://blogproject.test/createpost"
                        style="background-color:white;color:grey;font-weight:600;" type="button"
                        class="btn btn-primary bg-white text-grey">
                        buy Mobile
                    </a>
                @else
                    <a href="{{ route('createpost') }}" style="background-color:white;color:grey;font-weight:600;"
                        class="btn btn-primary bg-white text-grey">
                        +Sell Mobile
                    </a>
                @endif
            </div>
            <div class="col-md-2">
                {{-- @if (auth()->check() && auth()->user()->usertype == 'admin')
                    <a class="btn btn-info" href="{{ route('blogpost') }}">blog</a>
                @else
                    <a class="btn btn-info" href="{{ route('blog') }}">blog</a>
                @endif --}}
                @auth
                    <a href=""><i style="color: blue; font-size:30px; margin-left:25px;"
                            class="fa-solid fa-comment-dots"></i></a>
                @endauth
            </div>
        </div>
    </div>
    {{-- get data form database --}}
    <div class="container mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="col-md-8 mx-auto">
            <div class="card-body">
                <div><img style=" max-height:300px; width:auto;" src="/postimage/{{ $post->image }}"
                        class="services_img ">
                </div>
                <a style="font-size:35px;" class="btn btn-primary" href="{{ url('chatify/' . $post->user_id) }}">Chat
                    with seller</a>
                <h4 class="text-center font-weight-bold text-xl my-2">{{ $post->title }}</h4>
                <p class="text-lg text-justify mb-5">{{ $post->description }}</h5>
                <p style="font-weight:800;color:blue;font-size:20px;" class="text-right">
                    <i class="fa-solid fa-phone-volume p-2">
                    </i>{{ $post->mobile }}
                </p>
                <p style="font-weight:500;color:blue" class="text-lg text-justify mb-5">price..{{ $post->price }}
                    </h5>
                    {{-- <p class="ml-2">Post by{{ $post->name }}</p> --}}
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="fw-bold fs-3 text-primary">Recent Comments:</h3>
            </div>
        </div>
        @foreach ($comments as $comment)
            <div class="row mb-3 mt-2">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                            <h4 class="fw-bold fs-4">{{ $comment->user->name }}</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $comment->comments }}
                            </p>
                            @if (auth()->check() && auth()->id() == $comment->user->id)
                                <a class="btn btn-danger mt-4"
                                    href="{{ url('/commentdelete', $comment->id) }}">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row mt-4">
            <form action="{{ route('comment') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="col-md-8 mx-auto bg-white rounded-2xl p-3 shadow-md">
                    <h6 class="text-xl">Add Comments/Questions</h6>
                    <div style="position:relative;overflow-y:visible"
                        class="bg-[#e5e7eb] h-[228px] p-4 py-6 focus-visible:outline-none rounded-md mt-3 comments_mentionedcomments__xjKIP bg-[#e5e7eb]--multiLine">
                        <div class="bg-[#e5e7eb]__control">
                            <div style="position:relative;box-sizing:border-box;width:100%;color:transparent;overflow:hidden;white-space:pre-wrap;word-wrap:break-word;border:1px solid transparent;text-align:start"
                                class="bg-[#e5e7eb]__highlighter"> </div>
                            <textarea placeholder="Use '@' to mention other users in the comment! i.e @username"
                                style="display:block;width:100%;position:absolute;margin:0;top:0;left:0;box-sizing:border-box;background-color:transparent;font-family:inherit;font-size:inherit;letter-spacing:inherit;height:100%;bottom:0;overflow:hidden;resize:none"
                                class="bg-[#e5e7eb]__input" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-3">
                        <span class="text-sm">
                            Enter 15 more characters
                        </span>
                        @if(auth()->check() && auth()->user()->usertype == 'user')
                            <a>
                                <button type="submit" class="btn btn-primary h-10 px-5">
                                    Comment
                            </a>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">comment</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- footer section --}}
    <div class="container mt-5">
        <div class="row bg-light mt-4">
            <div class="col-md-4">
                <a href="http://blogproject.test/">
                    <img src="{{ asset('images/logo.png') }}" style="width: 50px;"
                        alt="{{ config('app.name') }} Logo" />
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <h1>All rights reserved ©2024 ELX</h1>
            </div>
            <div class="col-md-4">
                <a href="">privacy & policy</a>
                <a style="margin-left:120px;" href="{{ route('contect') }}">Help</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
