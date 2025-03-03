<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section position-relative">
        @include('home.header')
    </div>
    <div class="container" data-aos="flip-left">
        <div  class="row-vr">
          <div class="col">
            <h4 style="text-align: center;font-size:40px; font-weight:700;color:blue" class="font-w8 mt-2 text-darkk">Web Development</h4>
          <p style="font-weight:400; font-size:20px;" class="text-center">Drive value for your business with our web development services. We are a reliable, affordable, and professional agency that offers services built on the latest technologies. Our team of experts takes care of all your needs and is engaged in catering well-featured, and tailor-made services to help you initiate your business online. Our range of web development services includes, front-end, back-end, and full-stack development with proficiency in e-commerce web development and CMS.  
            </p>
          </div>
          <div class="col">
            <h4 style="text-align: center;font-size:40px; font-weight:700;color:blue" class="font-w8 mt-2 text-darkk">Web Designing</h4>
            <p style="font-weight:400;font-size:20px;" class="text-center">We help you to engage with your potential audience because we are passionate to do so. Our web designers closely analyze the user audience and thus ensures to design of a creative, responsive, quick loading, and user-friendly website that is supported across all web browsers. Our team of skilled graphic designers has the ability to produce amazing and captivating visuals for brochures, banners, flyers, infographics, logos, and many other items in addition to building websites.
            </p>
          </div>
          <div class="col">
            <h4 style="text-align: center;font-size:40px; font-weight:700;color:blue" class="font-w8 mt-2 text-darkk">Digital Marketing</h4>
            <p style="font-weight:400;font-size:20px;" class="text-center">We provide the best marketing idea for your business that’ll drive revenue. With our marketing strategists, you can create a good online presence and be competitive in today’s digital marketplace. We provide a range of services from driving organic traffic to paid media advertisement. We have industry experts in PPC advertising, social media marketing, social media optimization, search engine optimization, and many other marketing strategies to cater to your business needs. 
            </p>
            
          </div>
        </div>
      </div>
        <div class="conatiner">
            <div class="row">
                <div style="text-align: center" class="col-md-12">
                    <a href="http://blogproject.test/contect" class="btn btn-primary">Request a Quote!</a>
                </div>
            </div>
        </div>
    @include('home.footer')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        offset:300,
        duration:1000,
    });
    </script>
</body>

</html>
