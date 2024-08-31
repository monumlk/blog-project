<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <!-- form-->
        <div class="container py-5">
            <h1 class="text-center mb-4 text-xl font-weight-bold"> Add Post </h1>
            @if(session()->has('messsage'))
            <div class="alert-alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> 
               x
            </button>
            {{session()->get('message')}}

            </div>
            @endif

           <form action="{{url('/add_post')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="title" name="title">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlInput1"
                        placeholder="image">
                </div>
                      
                <div class="">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        @include('admin.footer')
</body>

</html>
