<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homecss')
</head>
<body>
     <h1 style="color: blue;font-size: 30px;font-weight:500" class="text-center mt-5">Contact data</h1>
<div  style="text-align: center;margin-top: 100px" class="container">
    <table class="table">
        <div class="col-md-6">
            <thead>
                <tr>
                    <th scope="col-">first_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">message</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
        </div>
        <tbody>
            @foreach ($data as $post)
                <tr>
                    <td>{{ $post->first_name}}</td>
                    <td>{{ $post->last_name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->phone }}</td>
                    <td>{{ $post->message }}</td>
                    <td>{{ $post->service }}</td>
                   <td> <a onclick="return confirm('are you sure to delete')"
                  href="{{ url('/contactdelete', $post->id)}}" class="btn btn-danger">Delete</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>