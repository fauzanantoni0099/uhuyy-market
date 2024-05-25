<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Book;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
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
            $query = $request->input('query');
            $artists = Artist::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $artists = Artist::latest()->paginate();
        }

        return view('back.artists.index',compact('artists'));
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
                'genre'=>'required',
                'address'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);

            $artist = Artist::create([
                'name'=>$request->name,
                'genre'=>$request->genre,
                'address'=>$request->address,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'), $fileName);

                if(!$artist->images()->exists())
                {
                    $artist->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$artist->id,
                        'imageable_type'=>Artist::class
                    ]);
                }
                else
                {
                    $artist->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$artist->id,
                        'imageable_type'=>Artist::class
                    ]);
                }

            }
            toast('Data berhasil disimpan','success');
            DB::commit();
            return redirect()->route('artist.index',$artist);
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
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'name'=>'required',
                'genre'=>'required',
                'address'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);

            $artist->update([
                'name'=>$request->name,
                'genre'=>$request->genre,
                'address'=>$request->address,
                'note'=>$request->input('note') ?: null
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'), $fileName);

                if(!$artist->images()->exists())
                {
                    $artist->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$artist->id,
                        'imageable_type'=>Artist::class
                    ]);
                }
                else
                {
                    $artist->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$artist->id,
                        'imageable_type'=>Artist::class
                    ]);
                }

            }
            toast('Data berhasil diupdate','success');
            DB::commit();
            return redirect()->route('artist.index',$artist);
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
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        try {
            $artist->delete();
            foreach ($artist->images as $image) {
                // Hapus gambar dari penyimpanan
                if (Storage::exists($image->name_path)) {
                    Storage::delete($image->name_path);
                }

                // Hapus entri gambar dari database
                $image->delete();
            }
            $artist->images()->delete();
            $artist->albums()->delete();
            $songs = $artist->songs;
            foreach ($songs as $song){
                $song->files()->delete();
            }
            $artist->songs()->delete();

            toast('Data berhasil dihapus','success');
            DB::commit();
            return redirect()->route('artist.index',$artist);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
