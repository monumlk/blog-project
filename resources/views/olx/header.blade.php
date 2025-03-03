<div class="container mt-2">
    <div class="row bg-light p-2">
        <div class="col-md-2">
            <a href="{{ route('blog') }}">
                <img src="{{ asset('images/logo.png') }}" class="h-60px" alt="{{ config('app.name') }} Logo" />
            </a>
        </div>
        <div class="col-md-4">
            <div>
                <form action="/search">
                    <div class="input-group flex-nowrap">
                        <input type="text" name="query" class="form-control search-form" placeholder="Search"
                            aria-label="Username" aria-describedby="addon-wrapping">
                        <button type="submit" class="input-group-text" id="addon-wrapping"><a href="/"><i
                                    class="fa-solid fa-magnifying-glass"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2">
            @auth
                <x-app-layout />
            @endauth
        </div>
        <div class="col-md-2">
            @if (request()->is('post_details/*'))
                <a href="http://blogproject.test/createpost" style="background-color:white;color:grey;font-weight:600;"
                    type="button" class="btn btn-primary bg-white text-grey">
                    buy Mobile
                </a>
            @else
                <a id="load-data" href="{{ route('createpost') }}" style="background-color:white;color:grey;font-weight:600;"
                    class="btn btn-primary bg-white text-grey">
                    +Sell Mobile
                </a>
            @endif
        </div>
        <div class="col-md-2">
            @auth
            <a href="{{ url('chatify') }}" class="position-relative">
                @if(auth()->user()->unseenMessages()->count())
                <span class="position-absolute bg-danger text-white rounded-circle d-inline-flex justify-content-center align-items-center" style="width:15px;height:15px;top:-15px;right:-5px">
                    {{ auth()->user()->unseenMessages()->count() }}
                </span>
                @endif
                <i style="color: blue; font-size:30px; margin-left:25px;" class="fa-solid fa-comment-dots"></i>
            </a>
        @endauth
            {{-- @if (auth()->check() && auth()->user()->usertype == 'admin')
                <a class="btn btn-info" href="{{ route('blogpost') }}">blog</a>
            @else
                <a class="btn btn-info" href="{{ route('blog') }}">blog</a>
            @endif --}}
           
        </div>
    </div>
</div>
