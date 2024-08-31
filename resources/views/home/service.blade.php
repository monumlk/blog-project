<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                {{-- agar $post kitey define krya hou tahi use kra ge --}}
                
                @foreach ($post as $post) 
                    <div class="col-md-4 my-3">
                        <div><img src="/postimage/{{ $post->image }}" class="services_img"></div>
                        <h4 class="font-weight-bold text-lg">{{ $post->title }}</h4>
                        <p>{{ str($post->description)->limit(200) }}</h4>
                        <p class="text-right">-{{ $post->name }}</p>
                        <div class="btn_main"><a href="{{ url('post_details', $post->id) }}">Read More</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
