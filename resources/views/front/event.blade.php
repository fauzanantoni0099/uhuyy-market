@extends('front.blank')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/trigger.jpg);">
        <div class="bradcumbContent">
            <h2>Events</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single Event Area -->
                @foreach($events as $event)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            @foreach($event->images as $image)
                            <img src="/storage/images/{{$image->name_path}}" alt="">
                            @endforeach
                        </div>
                        <div class="event-text">
                            <a href="{{route('showEvent',$event)}}">
                            <h4>{{$event->name}}</h4>
                            </a>
                            <div class="event-meta-data">
                                <a href="{{route('showEvent',$event)}}" class="event-place">{{$event->location}}</a>
                                @if($event->date == null)
                                    <a href="{{route('showEvent',$event)}}">-</a>
                                @else
                                <a href="{{route('showEvent',$event)}}" class="event-date">{{\Carbon\Carbon::parse($event->date)->isoFormat('MMMM D, Y')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Events Area End ##### -->

    <!-- ##### Newsletter & Testimonials Area Start ##### -->
    <!-- ##### Newsletter & Testimonials Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
@endsection
