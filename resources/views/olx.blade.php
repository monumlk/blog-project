<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="test" content="test content">
    @include('home.homecss')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @include('olx.header')
    {{-- get data form database --}}
    {{-- <a href="{{ url('post_details', $post->id)}}"> --}}
    <div class="container my-2">
        <h1 style="font-weight:400;" class="services_taital">Latest Posts</h1>
        <div class="services_section_2 mt-1">
            <div class="row">
                @foreach ($post as $post)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="w-100 h-300px">
                                <img style="overflow: hidden" class="object-fit-cover w-60 h-100 mt-2"
                                    src="/postimage/{{ $post->image }}">
                            </div>
                            <div class="card-body">
                                <h4 class="font-weight-bold text-lg">
                                    {{ $post->title }}
                                </h4>
                                <p style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                                    {{ str($post->description)->limit(200) }}</p>
                                <p style="font-weight:800;color:blue;font-size:20px; class="text-right">
                                    रु..{{ $post->price }}</p>
                                <p style="font-weight:800;color:blue;font-size:20px;" class="text-right">
                                    <a href="{{ url('chatify/'. $post->user_id) }}">
                                        <i style="color: blue; font-size:30px; margin-left:25px;"
                                            class="fa-solid fa-comment-dots"></i>
                                    </a>
                                </p>
                                {{-- <p class="text-right">-{{ $post->name }}</p> --}}
                                <div class="btn_main">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>{{$post->city}}</p>
                                    {{-- <a href="{{ url('post_details', $post->id) }}">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </a>
    {{-- footer section --}}

    @include('olx.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        $(document).ready(function() {
            $('#load-data').click(function(e) {
                e.preventDefault()
                $.ajax({
                    url: 'createpost',
                    type: 'GET',
                    success: function(response) {
                        let html = '';
                        response.forEach(function(item) {
                            html += '<p>' + item.name +
                            '</p>'; // Adjust based on your data structure
                        });
                        $('#data-container').html(html);
                    },
                    error: function() {
                        alert('Error loading data');
                    }
                });
            });
        });
    </script>
</body>

</html>

{{-- 
<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('cb3d35e34745ce10cb2e', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('notification');
        channel.bind('test.notification', function(data) {
            if (data.price && data.title) {
                // toastr.info(
                //     `<div class="notification-content">
                //         <i class="fas fa-user"></i> <span>   ${data.author}</span>
                //         <i class="fas fa-book" style="margin-left: 20px;"></i> <span>  ${data.title}</span>
                //     </div>`,
                //     'New Post Notification', {
                //         closeButton: true,
                //         progressBar: true,
                //         timeOut: 0, // Set timeOut to 0 to make it persist until closed
                //         extendedTimeOut: 0, // Ensure the notification stays open
                //         positionClass: 'toast-top-right',
                //         enableHtml: true
                //     }
                // );
                alert(`${data.price}:\n ${data.title}`)
            } else {
                console.error('Invalid data received:', data);
            }
        });

        // Debugging line
        pusher.connection.bind('connected', function() {
            console.log('Pusher connected');
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body> --}}
