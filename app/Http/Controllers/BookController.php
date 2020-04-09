<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.book.index',[
            'book' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $number = Book::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(8)) , 8,"0") as number')->first();

        $kode = 'BUKU-'.$number->number;
    
        return view('pages.book.create',compact('kode'));
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
            'book_code' => ['required'],
            'book_name' => ['required'],
            'book_desc' => ['required'],
            'book_stock' => ['required'],
            'book_pict' => ['required'],
        ]);

        if($validatedData){

            $book = new Book();
            $book->book_code = $request->book_code;
            $book->book_name = $request->book_name;
            $book->book_desc = $request->book_desc;
            $book->book_stock = $request->book_stock;
            
            $file = $request->book_pict;
            $ext = $file->getClientOriginalExtension();
            $newName = 'Foto-'. $request->book_name . '.' .$ext;
            $file->move('uploads',$newName);

            $book->book_pict = $newName;

            $book->save();
            return redirect()->route('book.index');
        }else{

            return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.book.edit',['b'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
