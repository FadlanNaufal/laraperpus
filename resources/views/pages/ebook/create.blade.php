@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Create E-Book</h1>
          </div>
          <a href="{{route('ebook.index')}}" class="btn btn-warning">Back</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('ebook.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">E-Book Name</label>
                            <input type="text" class="form-control" name="ebook_name">
                        </div>
                        <div class="form-group">
                            <label for="">E-Book File</label>
                            <input type="file" class="form-control" name="ebook_file">
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
