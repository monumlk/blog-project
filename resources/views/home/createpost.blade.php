<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('home.homecss')
    @include('sweetalert::alert')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Hello, world!</title>
</head>
<body>
   @include('olx.header')
     
   {{-- Add post form --}}
    <div class="container my-5">
        <h1 class="post_title" style="color:blue; font-size:40px; font-weight:500">Add Post</h1>
        <form action="{{ url('/user_post') }}" method="post" id="form" enctype="multipart/form-data">
            @csrf
            <div id="response" class="text-danger">

            </div>
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
                <label for="exampleFormControlTextarea1" class="form-label" style="color: white;">Example
                    textarea</label>
                <textarea placeholder="Description & mobile number" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="color: white">Image</label>
                <input type="file" min="0" max="10000" class="form-control" name="image" id="exampleFormControlInput1"
                    placeholder="image">
            </div>
            <div style="width:200px;" class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"></label>
                <input type="text" value="{{ old('city') }}" class="form-control "  name="city" id="exampleFormControlInput1"
                    placeholder="city">
            </div>
            <div style="width:200px;" class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"></label>
                <input type="number" value="{{ old('price') }}" class="form-control "  name="price" id="exampleFormControlInput1"
                    placeholder="price">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
   
    {{-- footer section --}}
     @include('olx.footer')
     {{-- <script>
         $(document).ready(function(){
            $('#form').on('submit', function(event) {
                const $form = $(this);
                event.preventDefault(); // Prevent the default form submission
                $.ajax({
                    url: "{{ route('user_post') }}", // Replace with your server endpoint
                    type: 'POST',
                    data: $form.serialize(), // Serialize the form data
                    beforeSend: function() {
                        $form.find(":submit").html("Submitting...").prop("disabled", true)
                    },
                    success: function(response) {
                        $('#response').html(response); // Handle the response
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        let errorMessage = jqXHR.responseJSON.message                        
                        $('#response').html('Error: ' + errorMessage);
                    },
                    complete: function() {
                        $form.find(":submit").html("Save").prop("disabled", false)
                    }
                });
            });
        });
     </script> --}}
  
</body>

</html>
