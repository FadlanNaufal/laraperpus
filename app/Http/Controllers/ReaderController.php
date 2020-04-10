<?php

namespace App\Http\Controllers;

use App\Reader;
use Hash;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.reader.index',[
            'reader'=>Reader::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.reader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('post', [
            'reader_name' => ['required'],
            'reader_username' => ['required'],
            'reader_password' => ['required'],
        ]);

        if($validatedData){

            $reader = new Reader();
            $reader->reader_name = $request->reader_name;
            $reader->reader_username = $request->reader_username;
            $reader->reader_password = Hash::make($request->reader_password);
            $reader->save();
            return redirect()->route('reader.index')->with('success','Berhasil Simpan data');
        }else{
            return back()->with('error','Gagal Simpan data');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function show(Reader $reader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function edit(Reader $reader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reader $reader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reader $reader)
    {
        //
    }
}
