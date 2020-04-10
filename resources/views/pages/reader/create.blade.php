@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Create Reader</h1>
          </div>
          <a href="{{route('reader.index')}}" class="btn btn-warning">Back</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('reader.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Reader Name</label>
                            <input type="text" class="form-control" name="reader_name">
                        </div>
                        <div class="form-group">
                            <label for="">Reader Username</label>
                            <input type="text" class="form-control" name="reader_username">
                        </div>
                        <div class="form-group">
                            <label for="">Reader Password</label>
                            <input type="text" class="form-control" name="reader_password">
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
