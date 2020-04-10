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
          <a href="{{route('reader.create')}}" class="btn btn-primary">Add Member</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Reader Name</th>
                          <th>Reader Username</th>
                          <th>Reader Status</th>
                          <th>Borrow Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($reader as $b)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{$b->reader_name}}</td>
                          <td>{{$b->reader_username}}</td>
                          <td>
                            @if($b->reader_status == 1)
                                <span class="badge badge-primary">Active</span>
                            @elseif($b->reader_status == 0)
                            <span class="badge badge-danger">Unactive</span>
                            @endif
                          </td>
                          <td>
                          @if($b->borrow_status == 1)
                                <span class="badge badge-primary">Free</span>
                            @elseif($b->borrow_status == 0)
                            <span class="badge badge-danger">Borrowing</span>
                            @endif
                          </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
