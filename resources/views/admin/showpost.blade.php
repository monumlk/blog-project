<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <table class="table">
                <div class="col-md-6">
                    <thead>
                        <tr>
                            <th scope="col">post title</th>
                            <th scope="col">description</th>
                            <th scope="col">Post by</th>
                            <th scope="col">post status</th>
                            <th scope="col">usertype</th>
                            <th scope="col">Image</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                            <th>Status Accept</th>
                            <th>Status Reject</th>
                        </tr>
                    </thead>
                </div>
                <tbody>
                    @foreach ($post as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->post_status }}</td>
                            <td>{{ $post->usertype }}</td>
                            <td>
                                <img width="80px" src="postimage/{{ $post->image }}">
                            </td>
                            <td>
                                <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                                    onclick="confirmation(event)">Delete</a>
                            </td>
                            <td>
                                <a href="{{ url('updatepage', $post->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a onclick="confirm('Are You Sure To Accept this Post')" href="{{url('acceptpost',$post->id)}}" class="btn btn-outline-secondary">Accept</a>
                            </td>
                            <td>
               <a onclick="return confirm('Are You Sure To Reject this Post ?')" href="{{url('rejectpost',$post->id)}}" class="btn btn-primary">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.footer')
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                swal({
                        title: "Are You sure to delete this ?",
                        text: "you won't to able to revert this delete",
                        icon: "warring",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((withCancel) => {
                        if (withCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>
</body>

</html>
