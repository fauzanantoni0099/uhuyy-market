@extends('front.blank')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/trigger.jpg);">
        <div class="bradcumbContent">
            <h2>Artist</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <center>
                        <div class="blog-post-thumb mt-30">
                            @foreach($artist->images as $image)
                            <a href="#"><img src="/storage/images/{{$image->name_path}}" alt="" width="700px"></a>
                            @endforeach
                        </div>
                        </center>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">{{$artist->address}}</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">{{$artist->genre}}</p>
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{$artist->note}}</p>
                        </div>
                    </div>

                </div>
                @foreach($artist->albums as $album)
                    <div class="col-12 col-lg-4">

                        <!-- Single Post Start -->
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb mt-30">
                                @foreach($album->images as $image)
                                    <a href="{{route('show',$album)}}"><img src="/storage/images/{{$image->name_path}}" alt=""></a>
                                @endforeach
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <!-- Post Title -->
                                <a href="{{route('show',$album)}}" class="post-title">{{$album->name}}</a>
                                <!-- Post Meta -->
                                <div class="post-meta d-flex mb-30">
                                    <p class="post-author">{{\Carbon\Carbon::parse($album->release)->isoFormat('MMM Y')}}</p>
                                </div>
                                <!-- Post Excerpt -->
                                <p>{{$artist->note}}</p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(/img/bg-img/vexed-2.jpg);">
        <div class="container">
            @foreach($artist->albums as $key=>$album)
                @if($key <1)
                    <div class="row align-items-end">
                        <div class="col-12 col-md-5 col-lg-4">
                            @foreach($artist->images as $image)
                                <div class="featured-artist-thumb">
                                    <img src="/storage/images/{{$image->name_path}}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-7 col-lg-8">
                            <div class="featured-artist-content">
                                <!-- Section Heading -->
                                <div class="section-heading white text-left mb-30">
                                    <h2>{{$album->name}}</h2>
                                </div>
                                <p>{{$album->note}}</p>
                                @foreach($album->songs as $key => $song)
                                    @if($key <1)
                                        <div class="song-play-area">
                                            <div class="song-name">
                                                <p>01. {{$song->title}}</p>
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
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <!-- ##### Contact Area Start ##### -->
@endsection
