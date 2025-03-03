<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('home.homecss')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Hello, world!</title>
</head>

<body>
    @include('olx.header')
    {{-- get data form database --}}
    <div class="container">
        <div class="row mt-4 text-center">
            <div class="col-md-12">
                <h1 class="font-weight-bold page-title" data-text="Contact&nbsp;Us">Contact&nbsp;Us</h1>
            </div>
        </div>
        @if (Session::has('message'))
            <div style="font-size: 20px; font-weight:700" class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-6">
                <img class="w-100 businesswoman-img" src="https://devexhub.com/images/phone.png"
                    style="max-width:500px;">
            </div>
            <div class="col-md-6">
                <h2 style="font-weight:700;" class="offering-heading font-w8 underline line-1 text-primary">Send us
                    a
                    Message!</h2>
                <p style="font-weight:500;">We are happy to answer any questions. Talk to our team of experts to
                    help
                    make informed decisions for top-notch outcomes. Just fill out this short form and we will get
                    back
                    to you shortly.</p>
                <h4 class="icon-text d-flex align-items-center mt-5">
                    <span><i class="fas fa-phone-alt mr-3 phone"></i></span>
                    <span><a style="font-style: bold; font-weight:700" href="tel:+919875905952"
                            bis_skin_checked="1">(+91)</a></span>
                </h4>
                <h4 class="icon-text  d-flex align-items-center mt-4">
                    <span><i style="font-style: bold; font-weight:700" class="fa fa-envelope mail mr-3"
                            aria-hidden="true"></i>
                    </span>
                    <span><a style="font-style: bold; font-weight:700" href="mailto:info@devexhub.com"
                            bis_skin_checked="1">elxmobile05@gmail.com</a></span>
                </h4>
                <h4 class="icon-text loction-main mt-4  d-flex">
                    <span><i class="fas fa-map-marker-alt mr-3 loction"></i></span>
                    <span style="font-style: bold; font-weight:700">Plot no D-258, GR Tower, 3rd floor,Phase8,
                        Mohali</span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <form class="w-100" action="{{ url('contect')}}" method="post">
            @csrf
            <div class="outer-form">
                <div class="row">
                    <div class="col-md-6 col-12 mb-3 pr-md-2" name="firstname">
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                            size="40" class="form-control" aria-required="true" aria-invalid="false"
                            placeholder="First Name">
                        @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3 pl-md-2">
                        <input type="text" name="lastname" id="last_name" value="{{ old('lastname') }}"
                            size="40" class="form-control" aria-required="true" aria-invalid="false"
                            placeholder="Last Name">
                        @error('lastname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3 pr-md-2">
                        <input type="email" name="email" id="e_mail" value="{{ old('email') }}"
                            size="40" class="form-control" aria-required="true" aria-invalid="false"
                            placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3 pl-md-2">
                        <input type="tel" name="phone" id="phone_no" value="{{ old('phone') }}"
                            size="40" class="form-control" aria-required="true" aria-invalid="false"
                            placeholder="Phone">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <textarea name="message" id="descri_ption" cols="40" rows="10" class="form-control" aria-invalid="false"
                            placeholder="What can we help you with?">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mb-3 row">
                    <div class="g-recaptcha" id="recaptcha"
                        data-sitekey="6LcCrc8mAAAAAHHgIvupLocobXKru2dyIlsZYOb3">
                    </div>
                </div>
                <div style="text-align: center" class="tacbox">
                    <input name="checkbox" id="checkbox" type="checkbox" />
                    <label for="checkbox"> By selecting this, you agree to our <a style="color: blue"
                            href="#">Privacy & Policy</a></label>
                    @error('checkbox')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" id="contactForm" value="Submit"
                    class="wpcf7-form-control has-spinner wpcf7-submit btn w-100 btn-primary">
            </div>
        </form>
    </div>
    {{-- footer section --}}
    @include('olx.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
