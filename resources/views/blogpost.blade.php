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
        crossorigin="anonymous" referrerpolicy="no-referrer" 
    />

    <title>Hello, world!</title>
</head>

<body>
   @include('olx.header')
   <div class="conatiner">
    <div class="container my-5">
        <h1 class="post_title" style="color:blue; font-size:40px; font-weight:500">Add Blog</h1>
        <form action="{{url('/blogpost')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{$error}}
                </div>
                @endforeach
                @endif
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" style="color: white;">Title</label>
                        <input type="text" placeholder="Title" value="{{ old('title') }}" class="form-control"
                            id="exampleFormControlInput1"  name="title">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="color: white">Image</label>
                <input type="file" min="0" max="10000" class="form-control" name="image" id="exampleFormControlInput1"
                    placeholder="image">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: white;">Example
                    textarea</label>
                <textarea placeholder="Description" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
            </div>
           
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
   
   {{-- footer section --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> 

</body>

</html>
