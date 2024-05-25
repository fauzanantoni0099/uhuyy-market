@extends('front.blank')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/trigger.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Latest Albums</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                @foreach($albums as $album)
                    <!-- Single Album -->
                    <div class=" col-lg-3 single-album-item">
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
