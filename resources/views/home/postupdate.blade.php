<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    <base href="/public">
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
        <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
             @endif
            <h1 style="color:green; font-size:30px;">Update Post</h1>
        <form action="{{url('/add_post')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" value="{{$data->title}}" class="form-control" id="exampleFormControlInput1"
                            placeholder="title" name="title">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$data->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">current Image</label>
             <img  height="150" width="250" src="/postimage/{{$data->image}}">   
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


        
      <!-- footer section start -->
     @include('home.footer')   
   </body>
</html>