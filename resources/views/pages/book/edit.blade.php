@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Edit Book</h1>
          </div>
          <a href="{{route('book.index')}}" class="btn btn-warning">Back</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('book.update',$b)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('patch')
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
                            <label for="">Book Picture</label>
                            <input type="file" class="form-control" name="book_pict">
                        </div>
                        <div class="form-group">
                            <label for="">Book Status</label>
                            <select class="form-control" id="type" name="book_status">
                                   @if($b->book_status == 1)
                                   <option value="1" selected=""> Available </option>
                                   <option value="0"> Unavailable </option>
                                   @else
                                   <option value="1"> Available </option>
                                   <option value="0" selected=""> Unavailable </option>
                                   @endif
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info">Update</button>
                            <a href="{{route('book.index')}}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
