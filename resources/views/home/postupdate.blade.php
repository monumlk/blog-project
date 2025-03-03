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
        crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <title>Hello, world!</title>
</head>

<body>
    {{-- user post update form --}}
    <div class="container mt-2">
        <div class="row bg-light p-2">
            <div class="col-md-2">
             <a href="http://blogproject.test/">
                <img 
                src="{{ asset('images/logo.png') }}" 
                style="width:50px;"
                alt="{{ config('app.name') }} Logo" 
            />
                </a>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Username"
                            aria-describedby="addon-wrapping">
                        <span class="input-group-text" id="addon-wrapping"><a href=""><i
                                    class="fa-solid fa-magnifying-glass"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                @auth
                    <x-app-layout />
            @endauth
            </div>
            <div class="col-md-2">
                <a href="http://blogproject.test/createpost">
                    <button
                        style="background-color:white;color:grey;font-weight:600;" type="button"
                        class="btn btn-primary bg-white text-grey">+Sell Mobile
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <h1 style="color:green; font-size:30px;">Update Post</h1>
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{$error}}
        </div>
        @endforeach
        @endif
    <form action="{{url('/postupdatedata/'. $data->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mt-2">Title</label>
                    <input type="text" value="{{$data->title}}"  class="form-control" id="exampleFormControlInput1"
                        placeholder="title" name="title">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{$data->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">current Image</label>
         <img  height="150" width="250" src="/postimage/{{$data->image}}">   
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image</label>
            <input type="file" value="{{$data->image}}"  class="form-control" name="image" id="exampleFormControlInput1"
                placeholder="image">
                <div style="width:200px;" class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"></label>
                    <input type="number" value="{{$data->mobile}}" class="form-control "  name="mobile" id="exampleFormControlInput1"
                        placeholder="Phone Number">
                </div>

        <div style="width:200px;" class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="number" value="{{$data->price}}" class="form-control " name="price" id="exampleFormControlInput1"
                placeholder="price">
        </div>
              
        <div class="">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>
    </div>
    </div>
   {{-- footer --}}
   <div class="container">
    <div class="row bg-light mt-4">
        <div class="col-md-4">
            <a href="http://blogproject.test/">
                <img 
                src="{{ asset('images/logo.png') }}" 
                style="width:50px"
                alt="{{ config('app.name') }} Logo" 
            />
            </a>
        </div>
        <div class="col-md-4 mt-2">
            <h1>All rights reserved ©2024 ELX</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('policy')}}">privacy & policy</a>
            <a style="margin-left:120px;" href="{{route('contect')}}">Help</a>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
