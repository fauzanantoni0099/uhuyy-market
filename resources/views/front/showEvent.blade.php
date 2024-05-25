@extends('front.blank')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/trigger.jpg);">
        <div class="bradcumbContent">
            <h2>{{$event->name}}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                    <!-- Single Album -->
                @foreach($event->galleries as $gallery)
                    <div class=" col-lg-6 single-album-item">
                        <div class="single-album">
                            @foreach($gallery->images as $image)
                            <img src="/storage/images/{{$image->name_path}}" alt="">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
