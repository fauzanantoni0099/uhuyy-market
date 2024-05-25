<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Uhuyy Records.</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/dis6.jpg">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="{{'/'}}"><img src="img/core-img/logow.png" alt="" width="200px"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{'/'}}">Home</a></li>
                                    <li><a href="{{route('albums')}}">Albums</a></li>
                                    <li><a href="{{route('event')}}">Events</a></li>
                                    <li><a href="{{route('about')}}">about</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>

                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <div class="login-register-btn mr-50">
                                    </div>

                                    <!-- Cart Button -->
                                    <div class="cart-btn">
                                    </div>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/vexed.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Uhuyy Records.<span>Uhuyy Records.</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="{{route('contact')}}" class="btn oneMusic-btn mt-50">Contact Us <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">No Matter Your Music Are <span>No Matter Your Music Are</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="{{route('contact')}}" class="btn oneMusic-btn mt-50">Contact Us<i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/5.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Just Turn Up The Volume <span>Just Turn Up The Volume</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="{{route('contact')}}" class="btn oneMusic-btn mt-50">Contact Us<i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Latest Artist</h2>
                    </div>
                </div>
            </div>
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-12 col-lg-9">--}}
{{--                    <div class="ablums-text text-center mb-70">--}}
{{--                        <p>Band music is a group of individuals who collaborate to create and perform music together. They can consist of several members who have different roles, such as vocalists, guitarists, bassists, drummers, and possibly other members like keyboardists or string instrument players.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        @foreach($artists as $artist)
                        <div class="single-album">
                            @foreach($artist->images as $image)
                            <img src="/storage/images/{{$image->name_path}}" alt="">
                            @endforeach
                            <div class="album-info">
                                <a href="{{route('showArtist',$artist)}}">
                                    <h5>{{$artist->name}}</h5>
                                </a>
                                <p>{{$artist->genre}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <h2>Albums</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        @foreach($albums as $album)
                            <div class="single-album">
                                @foreach($album->images as $image)
                                    <img src="/storage/images/{{$image->name_path}}" alt="">
                                @endforeach
                                <div class="album-info">
                                    <a href="{{route('show',$album)}}">
                                        <h5>{{$album->name}}</h5>
                                    </a>
                                    <p>{{$album->artist->name}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/4.jpg);">
        <div class="container">
            @foreach($songNew as $song)
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    @foreach($song->artist->images as $image)
                    <div class="featured-artist-thumb">
                        <img src="/storage/images/{{$image->name_path}}" alt="">
                    </div>
                    @endforeach
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>{{$song->artist->name}}</p>
                            <h2>{{$song->album->name}}</h2>
                        </div>
                        <p>{{$song->note}}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>01 .{{$song->title}}</p>
                            </div>
                            @foreach($song->files as $file)
                                <audio preload="auto" controls>
                                    <source src="/storage/files/{{$file->name_path}}">
                                </audio>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>This week’s top</h2>
                        </div>
                        @foreach($albums as $key=>$album)
                            @if($key < 4)
                                <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                                    <div class="thumbnail">
                                        @foreach($album->images as $image)
                                            <img src="/storage/images/{{$image->name_path}}" alt="">
                                        @endforeach
                                    </div>
                                    <div class="content-">
                                        <h6>{{$album->name}}</h6>
                                        <p>{{$album->artist->name}}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>

                        <!-- Single Top Item -->
                        @foreach($songs as $key=>$song)
                            @if($key < 4)
                                <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                    <div class="first-part d-flex align-items-center">
                                        @foreach($song->artist->images as $image)
                                            <div class="thumbnail">
                                                <img src="/storage/images/{{$image->name_path}}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="content-">
                                            <h6>{{$song->title}}</h6>
                                            <p>{{$song->artist->name}}</p>
                                        </div>
                                    </div>
                                    @foreach($song->files as $file)
                                        <audio preload="auto" controls>
                                            <source src="/storage/files/{{$file->name_path}}">
                                        </audio>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>

                        <!-- Single Artist -->
                        @foreach($artists as $key=>$artist )
                            @if($key < 5)
                            <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                                <div class="thumbnail">
                                    @foreach($artist->images as $image)
                                    <img src="/storage/images/{{$image->name_path}}" alt="">
                                    @endforeach
                                </div>
                                <div class="content-">
                                    <p>{{$artist->name}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/vexed-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="{{route('message.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="note" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <img src="img/core-img/uhuyy.png" alt="" width="100px">
                    <p class="copywrite-text">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Uhuyy Records. <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://instagram.com/fauzanantoni07" target="_blank">Ahmad Fauzan Antoni</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
