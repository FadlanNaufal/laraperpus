<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Book;
use App\Reader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.borrow.index',[
            'data'=>Borrow::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.borrow.create',[
            'data' => Reader::where('borrow_status','1')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carbon = Carbon::now();
        
        $borrow = new Borrow($request->all());
        $borrow->borrow_date = $carbon;
        $borrow->return_date = $carbon->addDays($request->return_date);
        $borrow->borrow_status = "uncomplete";
        $borrow->user_id = \Auth::user()->id;

        $borrow->save();

        return redirect()->route('borrow.show',$borrow)->with('success','Berhasil Simpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('pages.borrow.next',[
            'borrow'=>$borrow,
            'book' => Book::where('book_stock', '>' , 0)
            ->where('book_status',1)
            ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        $borrow->update([
            'borrow_status' => 'borrowed'
        ]);
        return redirect()->route('borrow.index')->with('success','Peminjaman Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
