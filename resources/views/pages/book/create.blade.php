@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form input</div>
                <div class="card-body">
                    <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Code</label>
                            <input type="text" class="form-control" name="book_code" value="{{$kode}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="book_name">
                        </div>
                        <div class="form-group">
                            <label for="">Book Desc</label>
                            <textarea name="book_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Book Stock</label>
                            <input type="number" class="form-control" name="book_stock">
                        </div>
                        <div class="form-group">
                            <label for="">Book Picture</label>
                            <input type="file" class="form-control" name="book_pict">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
