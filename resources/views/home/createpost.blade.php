<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
     @include('home.homecss')
   </head>
   <body>
    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
            <!-- footer section start -->
            <div class="container my-5">
                <h1 class="post_title" style="color: white;">Add Post</h1>
            <form action="{{url('/user_post')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color: white;">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="title" name="title">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="color: white;">Example textarea</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" style="color: white">Image</label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlInput1"
                        placeholder="image">
                </div>
                      
                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>

     @include('home.footer')   
   </body>
</html>