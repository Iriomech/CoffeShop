<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Coffee</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="/"><img src="img/logo.png" alt="" title="" /></a>
                </div>
            </div>
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                @if(backpack_user()->hasRole('employee') || backpack_user()->hasRole('admin'))
                <a href="/admin" class="text-sm text-gray-700 dark:text-gray-500">Admin</a>
                @endif
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500">Home</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500">Register</a>
                @endif
                @endauth
            </div>
        </div>
    </header><!-- #header -->


    <!-- start banner Area -->
    <section class="banner-area" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content col-lg-7">
                    <h6 class="text-white text-uppercase">Now you can feel the Energy</h6>
                    <h1>
                        Start your day with <br>
                        a black Coffee
                    </h1>
                    <a href="{{ route('home') }}" class="primary-btn text-uppercase">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start video-sec Area -->
    <section class="video-sec-area pb-100 pt-40" id="about">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                    <div class="overlay overlay-bg"></div>
                    <a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid" src="img/play-icon.png" alt=""></a>
                </div>
                <div class="col-lg-6 video-left">
                    <h6>Live Coffee making process.</h6>
                    <h1>We Telecast our <br>
                        Coffee Making Live</h1>
                    <p><span>We are here to listen from you deliver exellence</span></p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                    </p>
                    <img class="img-fluid" src="img/signature.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End video-sec Area -->

    <!-- Start menu Area -->
    <section class="menu-area section-gap" id="coffee">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">What kind of Coffee we serve for you</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $product)
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>{{ $product->name }}</h4>
                            <p class="price float-right">
                                ${{ $product->price }}
                            </p>
                        </div>
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                    @endforeach
                @else
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Cappuccino</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Americano</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Espresso</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Macchiato</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Mocha</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Coffee Latte</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Piccolo Latte</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Ristretto</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-menu">
                        <div class="title-div justify-content-between d-flex">
                            <h4>Affogato</h4>
                            <p class="price float-right">
                                $49
                            </p>
                        </div>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End menu Area -->

    <!-- Start gallery Area -->
    <section class="gallery-area section-gap border-b-light-900" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">What kind of Coffee we serve for you</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="img/g1.jpg" class="img-pop-home">
                        <img class="img-fluid" src="img/g1.jpg" alt="">
                    </a>
                    <a href="img/g2.jpg" class="img-pop-home">
                        <img class="img-fluid" src="img/g2.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-8">
                    <a href="img/g3.jpg" class="img-pop-home">
                        <img class="img-fluid" src="img/g3.jpg" alt="">
                    </a>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="img/g4.jpg" class="img-pop-home">
                                <img class="img-fluid" src="img/g4.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="img/g5.jpg" class="img-pop-home">
                                <img class="img-fluid" src="img/g5.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End gallery Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                        </p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-5  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>

                                <div class="info pt-20"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>