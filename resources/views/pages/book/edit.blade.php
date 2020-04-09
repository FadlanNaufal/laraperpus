@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form input</div>
                <div class="card-body">
                    <form action="{{route('book.update',$b)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Code</label>
                            <input type="text" class="form-control" name="book_code" value="{{$b->book_code}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="book_name" value="{{$b->book_name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Book Desc</label>
                            <textarea name="book_desc" id="" cols="30" rows="10" class="form-control">{{$b->book_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Book Stock</label>
                            <input type="number" class="form-control" name="book_stock" value="{{$b->book_stock}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
