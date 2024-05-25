<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
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
            $messages = Message::where('name','LIKE',"%$query%")
                ->paginate();
        }
        else{
            $messages = Message::latest()->paginate();
        }

        return view('back.messages.index',compact('messages'));
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
                'email'=>'required|email|string',
                'subject'=>'required',
                'note'=>'required'
            ],$message);

            $message = Message::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'note'=>$request->note,
            ]);

            toast('Data berhasil disimpan!!','success');
            DB::commit();
            return back();
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        try {
            $message->delete();
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
