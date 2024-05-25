<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artists = Artist::all();
        if ($request->input('query'))
        {
            $query = $request->input('query');
            $albums = Album::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $albums = Album::latest()->paginate();
        }

        return view('back.albums.index',compact('albums','artists'));
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
                'name'=>'required',
                'release'=>'required',
                'artist_id'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);

            $album = Album::create([
                'name'=>$request->name,
                'release'=>$request->release,
                'artist_id'=>$request->artist_id,
                'note'=>$request->input('note') ?: null
            ]);

            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'), $fileName);


                if(!$album->images()->exists())
                {
                    $album->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$album->id,
                        'imageable_type'=>Album::class
                    ]);
                }
                else
                {
                    $album->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$album->id,
                        'imageable_type'=>Album::class
                    ]);
                }

            }
            toast('Data Berhasil Disimpan!!','success');
            DB::commit();
            return redirect()->route('album.index',$album);
        }
        catch (\Exception $exception)
        {
            toast('Data Gagal Disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        try {
            $message =  [
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'name'=>'required',
                'release'=>'required',
                'artist_id'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048',
            ],$message);
            $album->update([
                'name'=>$request->name,
                'release'=>$request->release,
                'artist_id'=>$request->artist_id,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'),$fileName);

                if (!$album->images()->exists())
                {
                    $album->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$album->id,
                        'imageable_type'=>Album::class
                    ]);
                }
                else
                {
                    $album->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$album->id,
                        'imageable_type'=>Album::class
                    ]);
                }
            }
            toast('data berhasil diupdate!!!','success');
            DB::commit();
            return redirect()->route('album.index',$album);
        }
        catch (\Exception $exception)
        {
            toast('data gagal diupdate!!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        try {
            $album->delete();
            foreach ($album->images as $image) {
                // Hapus gambar dari penyimpanan
                if (Storage::exists($image->name_path)) {
                    Storage::delete($image->name_path);
                }

                // Hapus entri gambar dari database
                $image->delete();
            }

            $songs = $album->songs;
            foreach ($songs as $song)
            {
                $song->files()->delete();
            }
            $album->songs()->delete();

            toast('Data berhasil dihapus!!!','success');
            DB::commit();
            return redirect()->route('album.index');
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus!!!','error');
            DB::rollBack();
            return back();
        }
    }
}
