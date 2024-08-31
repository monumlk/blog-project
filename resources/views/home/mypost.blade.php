<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
     @include('home.homecss')
     <style type="text/css">
     .post_deg{
        padding: 30px;
        text-align:center;
        background-color: black;
     }
      .posttitle{
        font-size: 30px;
        font-weight:bold;
        padding: 15px;
        color: white;
      }
      .postdeg{
        font-size: 18px;
        font-weight:bold;
        padding: 15px;
        color: white;
      }
      .postimg{
        height: 200px;
        width: 300px;
        padding: 30px;
        margin: auto;
      }
      

    </style>



   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
        @if(session()->has('message'))
          <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           {{session()->get('message')}}
           @endif
          </div>
        

      @foreach ($data as $data )

        <div class="post_deg">
            <img  class="postimg"  src="/postimage/{{$data->image}}">
            <h4 class="posttitle" >{{$data->title}}</h4>
            <p class="postdeg">{{$data->description}}</p>
            <a onclick="return confirm('are you sure to delete')"  href="{{url('mypostdelete',$data->id)}}" class="btn btn-danger">Delete</a>
            <a class="btn btn-primary pd-5" href="{{url('postupdate',$data->id)}}">update</a>
        </div>
        @endforeach
      </div>

      <!-- footer section start -->
     @include('home.footer')   
   </body>
</html>