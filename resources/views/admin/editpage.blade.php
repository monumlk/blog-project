<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include("admin.css")
  </head>
  <body>
    @include("admin.header")
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include("admin.sidebar")
      <!-- Sidebar Navigation end-->
      <div class="page-content mb-4">
        <!-- session  message-->
        @if (session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session()->get('message') }}
        </div>
    @endif
        <h1 class="post_title">Update Post</h1>
        <form  class="col-md-8" method="post" action="{{url('updatepage', $post->id)}}" enctype="mutipart/form-data">
            @csrf
           
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="title" name="title" value="{{$post->title}}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control"name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
            </div>
            <div>
                <label>old image</label>
                <img src="/postimage/{{$post->image}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Update Old image</label>
                <input type="file" class="form-control" name="image" id="exampleFormControlInput1"
                    placeholder="image">
            </div>
                  
            <div class="">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>




        </form>
      </div>
      @include("admin.footer")
          </body>
</html>