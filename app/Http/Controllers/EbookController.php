<?php

namespace App\Http\Controllers;

use App\Ebook;
use Response;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ebook.index',[
            'ebook' => Ebook::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $ebook = new Ebook();
            $ebook->ebook_name = $request->ebook_name;
            $file = $request->ebook_file;

            $ext = $file->getClientOriginalExtension();
            $newName = 'PDF-'. $request->ebook_name . '.' .$ext;
            $file->move('uploads/pdf',$newName);

            $ebook->ebook_file = $newName;

            $ebook->save();
            return redirect()->route('ebook.index')->with('success','Berhasil Simpan data');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $ebook = Ebook::where('id',$id)->first();
        return view('pages.ebook.preview',compact('ebook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebook $ebook)
    {
        return view('pages.ebook.edit',['b'=>$ebook]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ebook $ebook)
    {
        if($request->hasFile('ebook_file')){
            $ebook->ebook_name = $request->ebook_name;
            $ebook->ebook_status = $request->ebook_status;
            
            $file = $request->ebook_file;
            $ext = $file->getClientOriginalExtension();
            $newName = 'Foto-'. $request->ebook_name . '.' .$ext;
            $file->move('uploads/pdf',$newName);
            $ebook->ebook_file = $newName;

            $ebook->update();
            return redirect()->route('ebook.index')->with('success','Berhasil Update data');
        }else{
            $ebook->ebook_name = $request->ebook_name;
            $ebook->ebook_status = $request->ebook_status;
            $ebook->update();
            return redirect()->route('ebook.index')->with('success','Berhasil Update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        //
    }
}
