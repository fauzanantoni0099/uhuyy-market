<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\File;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albums = Album::all();
        $artists = Artist::all();
        if ($request->input('query'))
        {
            $query = $request->input('query');
            $songs = Song::where('title','LIKE',"%$query%")->paginate();
        }
        else
        {
            $songs = Song::latest()->paginate();
        }

        return view('back.songs.index',compact('songs','albums','artists'));
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
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'artist_id'=>'required',
                'title'=>'required',
                'name_path'=>'required|mimes:mp3,mp4|max:25600'
            ],$message);
            $song = Song::create([
                'artist_id'=>$request->artist_id,
                'album_id'=>$request->input('album_id') ?: null,
                'title'=>$request->title,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/files'),$fileName);

                if (!$song->files()->exists())
                {
                    $song->files()->create([
                        'name_path'=>$fileName,
                        'fileable_id'=>$song->id,
                        'fileable_type'=>Song::class
                    ]);
                }
                else
                {
                    $song->files()->update([
                        'name_path'=>$fileName,
                        'fileable_id'=>$song->id,
                        'fileable_type'=>Song::class
                    ]);
                }
            }
            toast('Data berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('song.index',$song);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal disimpan!!','errorr');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        try {

            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'artist_id'=>'required',
                'title'=>'required',
                'name_path'=>'mimes:mp3,mp4|max:25600'
            ],$message);
            $song->update([
                'artist_id'=>$request->artist_id,
                'album_id'=>$request->input('album_id') ?: null,
                'title'=>$request->title,
                'note'=>$request->input('note')
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/files'),$fileName);

                if (!$song->files()->exists())
                {
                    $song->files()->create([
                        'name_path'=>$fileName,
                        'fileable_id'=>$song->id,
                        'fileable_type'=>Song::class
                    ]);
                }
                else
                {
                    $song->files()->update([
                        'name_path'=>$fileName,
                        'fileable_id'=>$song->id,
                        'fileable_type'=>Song::class
                    ]);
                }
            }
            toast('Data berhasil diupdate','success');
            DB::commit();
            return redirect()->route('song.index',$song);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal disimpan','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        try {
            $song->delete();
            foreach ($song->files as $file) {
                // Hapus gambar dari penyimpanan
                if (Storage::exists($file->name_path)) {
                    Storage::delete($file->name_path);
                }

                // Hapus entri gambar dari database
                $file->delete();
            }
            toast('Data berhasil dihapus!!','success');
            DB::commit();
            return back();
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
