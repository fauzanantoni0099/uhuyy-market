<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('query'))
        {
            $query =  $request->input('query');
            $events = Event::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $events = Event::latest()->paginate();
        }
        return view('back.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $message = [
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'name'=>'required',
                'location'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);
            $event = Event::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'date'=>$request->input('date') ?: null,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'),$fileName);

                if (!$event->images()->exists())
                {
                    $event->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$event->id,
                        'imageable_type'=>Event::class
                    ]);
                }
                else
                {
                    $event->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$event->id,
                        'imageable_type'=>Event::class
                    ]);
                }
            }
            toast('Data berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('event.index',compact('event'));
        }
        catch (\Exception $exception)
        {
            toast('Data gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'name'=>'required',
                'location'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);
            $event->update([
                'name'=>$request->name,
                'location'=>$request->location,
                'date'=>$request->input('date') ?: null,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'),$fileName);

                if (!$event->images()->exists())
                {
                    $event->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$event->id,
                        'imageable_type'=>Event::class
                    ]);
                }
                else
                {
                    $event->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$event->id,
                        'imageable_type'=>Event::class
                    ]);
                }
            }
            toast('Data berhasil diupdate!!','success');
            DB::commit();
            return redirect()->route('event.index',compact('event'));
        }
        catch (\Exception $exception)
        {
            toast('Data gagal diupdate!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();
            foreach ($event->images as $image) {
                // Hapus gambar dari penyimpanan
                if (Storage::exists($image->name_path)) {
                    Storage::delete($image->name_path);
                }

                // Hapus entri gambar dari database
                $image->delete();
            }
                $event->galleries()->delete();

            toast('Data berhasil dihapus!!','succes');
            DB::commit();
            return back();
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus','error');
            DB::rollBack();
            return back();
        }
    }
}
