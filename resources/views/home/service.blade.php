<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">Stay up-to-date with our latest blogs, where we share fresh insights, trends, and news on a variety of topics. Explore what's hot and current in our dynamic collection of articles, keeping you in the know and ahead of the curve.</p>
        <div class="services_section_2">
            <div class="row">          
                @foreach ($post as $post) 
                    <div class="col-md-4">
                        <div>
                            <img src="/postimage/{{ $post->image }}" class="services_img">
                        </div>
                        <h4 class="font-weight-bold text-lg">{{ $post->title }}</h4>
                        <p>{{ str($post->description)->limit(200) }}</p>
                        <p class="text-right">-{{ $post->name }}</p>
                        <div class="btn_main">
                            <a href="{{ url('post_details', $post->id) }}">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
