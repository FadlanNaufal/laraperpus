<?php

namespace App\Http\Controllers;

use App\BorrowDetail;
use App\Book;
use App\Borrow;
use Illuminate\Http\Request;

class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'borrow_id' => 'required',
            'book_id' => 'required',
            'total' => 'required',
        ]);

        $book = Book::where('id',$request->book_id);

        if($book->first()->book_stock < $request->total){
            return back()->with('error','Stock kurang');
        }else{
            $borrowDetail = BorrowDetail::where([
                'borrow_id' => $request->borrow_id,
                'book_id' => $request->book_id
            ]);

            $current = $book->first()->book_stock - $request->total;
            if($borrowDetail->count() > 0){
                return back()->with('success','Member hanya bisa meminjam 1 buku yang sama');
            }else{
                $id = BorrowDetail::create($request->all())->id;
            }

            $book->update([
                'book_stock' => $current
            ]);
        }

        return back()->with('success','Berhasil menambah ke keranjang');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $borrow)
    {
        $old_borrow = Borrow::find($borrow);
        for($i = 0 ; $i < count($request->book_id); $i++){
            $book = Book::find($request->book_id[$i]);
            $book->update([
                'book_stock' => $book->book_stock + $request->total_return[$i]
            ]);
        }
        $old_borrow->update([
            'status'=>'returned',
            'returned_on'=>date('y-m-d'),
        ]);
        return redirect()->route('borrow.index')->with('success','Berhasil Mengembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowDetail $borrowDetail)
    {
        //
    }
}
