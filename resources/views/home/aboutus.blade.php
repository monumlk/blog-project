<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- header section start -->
    <div class="header_section position-relative">
        @include('home.header')
    </div>

    <div class="about_section layout_padding py-5">
        <div class="container ">
            <span class="relative mb-2 md:mb-0 text-primary-600 dark:text-primary-400 inline-block"
                style="font-size: 30px; color:blue;font-style:italic; font-weight:700;">About Mlkweb Solutions <div
                    class="absolute -bottom-4 sm:-bottom-6 left-1/2 -translate-x-1/2 sm:pe-3" bis_skin_checked="1"><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="scale-x-[200%] sm:scale-x-[260%] scale-y-75 sm:scale-y-100" width="70.63932"
                        height="25.23866" viewBox="0 0 70.63932 25.23866" creator="Katerina Limpitsouni">
                        <path
                            d="M2.41072,7.75929c17.02568-.71364,34.05136-1.42727,51.07704-2.14091l14.70022-.61616-.6646-4.9107c-12.91114,2.24931-25.50153,6.02077-37.59863,11.04984-1.14989,.47804-1.99105,1.41114-1.79075,2.743,.18277,1.21528,1.18621,2.16637,2.45535,2.1677,3.4797,.00364,6.85119,.81258,9.99116,2.3105v-4.31735c-1.72999,.82125-3.65929,1.50251-5.2661,2.545-1.85577,1.20401-2.56038,3.57856-1.73346,5.61093,.99904,2.45541,3.31379,2.88317,5.70214,3.03169,3.21346,.19982,3.20156-4.80092,0-5-.42704-.02655-.86602-.10566-1.29319-.10946-.13576-.00121,.18317,.04243,.17324,.1348-.03856,.35884-.0895-.27388,.03982,.08986,.16194,.45549,.043-.29009,.0075,.15826-.02632,.33249-.53569,.38661,.03405,.1632,.2588-.10148,.50866-.24147,.75941-.3605,1.36673-.64881,2.73345-1.29761,4.10018-1.94642,1.63647-.77686,1.63166-3.53897,0-4.31735-3.94824-1.8835-8.12283-2.98855-12.51475-2.99314l.6646,4.9107c12.09709-5.02907,24.68748-8.80052,37.59863-11.04984,2.7805-.4844,2.12863-5.02778-.6646-4.9107C51.16231,.71586,34.13662,1.42949,17.11094,2.14313L2.41072,2.75929c-3.20582,.13437-3.22276,5.13508,0,5h0Z"
                            fill="currentColor" origin="undraw"></path>
                    </svg></div></span>


            <p style="font-size:20px; margin-top:2px;">

                Welcome to  Mlkweb Solutions  where innovative web development meets exceptional design. We’re a passionate
                team dedicated to crafting stunning, high-performance websites that help businesses thrive online.<br>
                At TechMahavir our mission is to transform your digital presence with cutting-edge technology
                and creative solutions. We believe that every business deserves a website that not only looks great but
                also drives results.
            </p>
            <br>
            <span class="relative mb-2 md:mb-0 text-primary-600 dark:text-primary-400 inline-block"
                style="font-size: 20px; color:blue;font-style:italic; font-weight:900;"> Why Choose  Mlkweb Solutions? <div
                    class="absolute -bottom-4 sm:-bottom-6 left-1/2 -translate-x-1/2 sm:pe-3" bis_skin_checked="1"><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="scale-x-[200%] sm:scale-x-[260%] scale-y-75 sm:scale-y-100" width="70.63932"
                        height="25.23866" viewBox="0 0 70.63932 25.23866" creator="Katerina Limpitsouni">
                        <path
                            d="M2.41072,7.75929c17.02568-.71364,34.05136-1.42727,51.07704-2.14091l14.70022-.61616-.6646-4.9107c-12.91114,2.24931-25.50153,6.02077-37.59863,11.04984-1.14989,.47804-1.99105,1.41114-1.79075,2.743,.18277,1.21528,1.18621,2.16637,2.45535,2.1677,3.4797,.00364,6.85119,.81258,9.99116,2.3105v-4.31735c-1.72999,.82125-3.65929,1.50251-5.2661,2.545-1.85577,1.20401-2.56038,3.57856-1.73346,5.61093,.99904,2.45541,3.31379,2.88317,5.70214,3.03169,3.21346,.19982,3.20156-4.80092,0-5-.42704-.02655-.86602-.10566-1.29319-.10946-.13576-.00121,.18317,.04243,.17324,.1348-.03856,.35884-.0895-.27388,.03982,.08986,.16194,.45549,.043-.29009,.0075,.15826-.02632,.33249-.53569,.38661,.03405,.1632,.2588-.10148,.50866-.24147,.75941-.3605,1.36673-.64881,2.73345-1.29761,4.10018-1.94642,1.63647-.77686,1.63166-3.53897,0-4.31735-3.94824-1.8835-8.12283-2.98855-12.51475-2.99314l.6646,4.9107c12.09709-5.02907,24.68748-8.80052,37.59863-11.04984,2.7805-.4844,2.12863-5.02778-.6646-4.9107C51.16231,.71586,34.13662,1.42949,17.11094,2.14313L2.41072,2.75929c-3.20582,.13437-3.22276,5.13508,0,5h0Z"
                            fill="currentColor" origin="undraw"></path>
                    </svg></div></span>

            <ul class="list-disc ms-5">
                <li class="mb-4"> </li>
                <li style="font-size:20px;" class="mb-4"> With over Four years in the industry, we have honed our
                    skills in web development,
                    UX/UI design, and digital strategy. Our team has worked with a diverse range of clients, from small
                    startups to large enterprises, delivering tailored solutions that exceed expectations. </li>
                <li class="mb-4" style="font-size:20px;"> At  Mlkweb Solutions  our mission is to transform your digital
                    presence with cutting-edge
                    technology and creative solutions. We believe that every business deserves a website that not only
                    looks great but also drives results. </li>
                <li class="mb-4" style="font-size:20px;"> We take pride in our unique approach to web development. By
                    combining technical
                    expertise with a deep understanding of user experience, we create websites that are both functional
                    and engaging. Our commitment to staying ahead of industry trends ensures that your website will
                    always be on the cutting edge. </li>
                <li class="mb-4" style="font-size:20px;" style="font-size:20px;"> Timely Delivery: We understand the
                    importance of deadlines. Count on us to deliver
                    your project on time, without compromising on quality. </li>
                <li class="mb-4" style="font-size:20px;"> Transparent Communication: Open and honest communication is
                    the foundation of a
                    successful partnership. We keep the lines of communication open, ensuring you're always in the loop.
                </li>
            </ul>
        </div>
    </div>
    {{-- <div class="container" data-aos="flip-left">
        <div class="row">
            <div class="col-sm-6">
                <h2 style="text-align: center; font-size:30px; color:blue;font-style:italic; font-weight:900;"
                    class="font-w8 underline line-1 text-primary">Over 4
                    years of Success &amp; Excellence</h2>
                <p style="font-size:20px;">We are a laser focussed IT solution hub with capabilities to address complex
                    business requirements. Founded by Mr, with a few dedicated individuals. Today we have grown into a
                    very big family. We have a team of experts in web development, web designing, and digital marketing
                    who with their innovative ideas, work closely with the latest technologies to get the best results
                    for clients. </p>
            </div>
            <div class="col-sm-6">
                <img src="https://devexhub.com/images/Untitled-111.png" class="gif-imgg img-fluid w-100"
                    style="max-width: 500px;" alt="success &amp; excellence team" width="100%" height="auto">
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // is krke header de upr container aa janda
        // jis krke header menues te click nhi hunda
        // isnu sahi tarike nal use krna pena:
        AOS.init({
            offset: 500,
            duration: 1000,
        });
    </script> --}}

    @include('home.footer')
</body>

</html>
