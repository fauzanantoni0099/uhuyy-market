<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Event;
use App\Gallery;
use App\Song;
use App\Testimoni;
use App\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $artists = Artist::latest()->get();
        $albums = Album::latest()->get();
        $songs = Song::inRandomOrder()->get();
        $songNew = Song::latest()->take(1)->get();

        return view('front.index',compact('artists','albums','songs','songNew'));
    }
    public function albums()
    {
        $albums = Album::all();
        return view('front.albums-store',compact('albums'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function about()
    {
        $testimonials = Testimonial::all();

        return view('front.abouts',compact('testimonials'));
    }
    public function event()
    {
        $galleries = Gallery::all();
        $testimonials = Testimonial::all();
        $events = Event::all();
        return view('front.event',compact('events','galleries','testimonials'));
    }
    public function blog()
    {
        return view('front.blog');
    }
    public function show(Album $album)
    {
        return view('front.albums',compact('album'));
    }
    public function showArtist(Artist $artist)
    {
        return view('front.showArtist',compact('artist'));
    }
    public function showEvent(Event $event)
    {
        return view('front.showEvent',compact('event'));
    }
}
