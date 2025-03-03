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

     <title>Hello, world!</title>
 </head>

 <body>
    
     <div style="overflow: hideen;" class="container mt-2">
         <div class="row bg-light p-2">
             <div class="col-md-2">
                 <a href="{{route('olx')}}">
                    <img 
                    src="{{ asset('images/logo.png') }}" 
                    class="h-60px"
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
                 <a href="http://blogproject.test/">
                     <button style="background-color:white;color:grey;font-weight:600;" type="button"
                         class="btn btn-primary bg-white text-grey">Buy Mobile
                     </button>
                 </a>
                 @auth
                 <a href=""><i style="color: blue; font-size:30px; margin-left:25px;" class="fa-solid fa-comment-dots"></i></a>
             @endauth
             </div>
         </div>
     </div>
     {{-- get user post form database --}}
     @if(Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
     @endif
     @if (Session::has('error'))
         <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
             {{ Session::get('error') }}
         </div>
     @endif
      <div class="container">
     <div class="row p-5 mt-2">
         <h1 style="font-size:40px;font-weight:700;" class="text-center mb-2">My Post</h1>
         @if($data->isEmpty())
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p style="font-size:20px; font:weight:700">There is no any post plz create post</p> 
         </div>    
    @endif
         @foreach ($data as $data)
             <div class="col-md-4">
                 <div class="card mb-3">
                     <div class="w-100 h-300px">
                         <img class="object-fit-cover w-80 h-100 mt-2" src="/postimage/{{ $data->image }}">
                     </div>
                     <div class="card-body">
                         <h4 class="posttitle">{{ $data->title }}</h4>
                         <p class="postdeg box" style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                             {{ $data->description }}</p>
                         <p style="font-weight:500;color:blue" class="posttitle">Price--{{ $data->price }}</p>
                         <p style="font-weight:500;color:blue" class="posttitle">mobile--{{ $data->mobile }}</p>
                         <a onclick="return confirm('are you sure to delete')"
                             href="{{ url('mypostdelete', $data->id) }}" class="btn btn-danger">Delete</a>
                         <a class="btn btn-primary pd-5" href="{{ url('postupdate', $data->id) }}">update</a>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
      </div>
     @include('olx.footer')



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
     </script>

 </body>

 </html>
