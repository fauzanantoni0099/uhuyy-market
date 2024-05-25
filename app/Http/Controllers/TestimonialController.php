<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('query')){
            $query = $request->input('query');
            $testimonials = Testimonial::where('name','LIKE',"%$query%")
                ->paginate();
        }
        else{
            $testimonials = Testimonial::latest()->paginate();
        }
        return view('back.testimonials.index',compact('testimonials'));
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
                'job'=>'required',
                'note'=>'required',
                'name_path'=>'required|mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);
            $testimonial = Testimonial::create([
                'name'=>$request->name,
                'job'=>$request->job,
                'note'=>$request->note
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'),$fileName);

                if (!$testimonial->images()->exists()){
                    $testimonial->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                    $testimonial->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }
            }
            toast('Data berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('testimonial.index',compact('testimonial'));
        }
        catch (\Exception $exception) {
            toast('Data gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'name'=>'required',
                'job'=>'required',
                'note'=>'required',
                'name_path'=>'mimes:jpeg,png,jpg,JPG,JPEG|max:2048'
            ],$message);
            $testimonial->update([
                'name'=>$request->name,
                'job'=>$request->job,
                'note'=>$request->note
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path('app/public/images'),$fileName);

                if (!$testimonial->images()->exists()){
                    $testimonial->images()->create([
                        'name_path'=>$fileName,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }
                else{
                    $testimonial->images()->update([
                        'name_path'=>$fileName,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }
            }
            toast('Data berhasil diupdate!!','success');
            DB::commit();
            return redirect()->route('testimonial.index',compact('testimonial'));
        }
        catch (\Exception $exception) {
            toast('Data gagal diupdate!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();
            foreach ($testimonial->images as $image) {
                // Hapus gambar dari penyimpanan
                if (Storage::exists($image->name_path)) {
                    Storage::delete($image->name_path);
                }

                // Hapus entri gambar dari database
                $image->delete();
            }            toast('Data berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('testimonial.index',compact('testimonial'));
        }
        catch (\Exception $exception){
            toast('Data gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
