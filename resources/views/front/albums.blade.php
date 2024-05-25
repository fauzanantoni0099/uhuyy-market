@extends('front.blank')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/trigger.jpg);">
        <div class="bradcumbContent">
            <p>{{$album->artist->name}}</p>
            <h2>Album</h2>
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
                            @foreach($album->images as $image)
                            <img src="/storage/images/{{$image->name_path}}" alt="" width="700px">
                            @endforeach
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>{{\Carbon\Carbon::parse($album->release)->isoFormat('D')}}</span>
                                <span>{{\Carbon\Carbon::parse($album->release)->isoFormat('MMM Y')}}</span>
                            </div>
                        </div>
                        </center>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">{{$album->name}}</a>
                            <!-- Post Meta -->
{{--                            <div class="post-meta d-flex mb-30">--}}
{{--                                <p class="post-author">By<a href="#"> Admin</a></p>--}}
{{--                                <p class="tags">in<a href="#"> Events</a></p>--}}
{{--                                <p class="tags"><a href="#">2 Comments</a></p>--}}
{{--                            </div>--}}
                            <!-- Post Excerpt -->
                            <p>{{$album->note}}</p>
                        </div>
                        <br>
                        <div class="one-music-songs-area mb-70">
                            <div class="container">
                                <div class="row">

                                    <!-- Single Song Area -->
                                    @foreach($album->songs as $song)
                                        <div class="col-12">
                                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                                <div class="song-thumbnail">
                                                    @foreach($album->artist->images as $image)
                                                        <img src="/storage/images/{{$image->name_path}}" alt="">
                                                    @endforeach
                                                </div>
                                                <div class="song-play-area">
                                                    <div class="song-name">
                                                        <p>{{$song->title}}</p>
                                                    </div>
                                                    <audio preload="auto" controls>
                                                        @foreach($song->files as $file)
                                                            <source src="/storage/files/{{$file->name_path}}">
                                                        @endforeach
                                                    </audio>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
@endsection
