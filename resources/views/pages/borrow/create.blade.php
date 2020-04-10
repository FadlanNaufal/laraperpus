@extends('layouts.template')
@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Reader</h1>
          </div>
          <div class="col-sm-12">
                @if($errors->any())
				    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                            </button>
                            {{ session ('error') }}
                        </div>
                        </div>
                    @endforeach
                @endif
                 @if(session('warning'))
                        <div class="alert alert-warning">
                            {{ session ('warning') }}
                        </div>
                @endif
                @if(session('success'))
                 <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                            </button>
                            {{ session ('success') }}
                        </div>
                        </div>
                @endif
        </div>
          <a href="{{route('borrow.index')}}" class="btn btn-warning">Back</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('borrow.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Borrower Name</label>
                            <select name="reader_id" id="" class="form-control" >
                            @foreach($data as $r)
                                <option value="{{$r->id}}">{{$r->reader_name}}</option>
                            @endforeach
					        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Operator Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
					        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Borrowing Time</label>
                            <select name="return_date" id="" class="form-control">
                                <option value="1">1 Hari</option>
                                <option value="3">3 Hari</option>
                                <option value="7">7 Hari</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Borrow Date</label>
                            <input type="text" class="form-control" name="borrow_date" value="{{date('y-m-d')}}" disabled="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
