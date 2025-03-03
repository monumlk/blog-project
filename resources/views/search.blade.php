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
    {{-- get data form database --}}
    <div class="container my-2">
        @if ($post->isEmpty())
            <div class="alert alert-success alert-dismissible fade show" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <p style="font-size:20px; font:weight:700"> Search Result Not Found</p>
            </div>
        @endif
        {{-- <h1 style="font-weight:400;" class="services_taital">Latest Posts</h1> --}}
        <div class="services_section_2 mt-1">
            <div class="row">
                @foreach ($post as $post)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="w-100 h-300px">
                                <img class="object-fit-cover w-80 h-100 mt-2" src="/postimage/{{ $post->image }}">
                            </div>
                            <div class="card-body">
                                <h4 class="font-weight-bold text-lg">
                                    {{ $post->title }}
                                </h4>
                                <p style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                                    {{ str($post->description)->limit(200) }}</p>
                                <p style="font-weight:800;color:blue;font-size:20px;" class="text-right">
                                    रु..{{ $post->price }}</p>
                                <p style="font-weight:800;color:blue;font-size:20px;" class="text-right">
                                    <a href="{{ route('postdetails', ['id' => $post->id]) }}">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </a>
                                </p>
                                <p class="text-right">-{{ $post->name }}</p>
                                <div class="btn_main">
                                    <a href="{{ url('post_details', $post->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</body>

</html>
