@extends('layouts.template')
@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Book</h1>
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
          <a href="{{route('book.create')}}" class="btn btn-primary">Add Book</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Book Code</th>
                          <th>Book Name</th>
                          <th>Book Desc</th>
                          <th>Book Stock</th>
                          <th>Book Picture</th>
                          <th>Book Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($book as $b)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{$b->book_code}}</td>
                          <td>{{$b->book_name}}</td>
                          <td>{{$b->book_desc}}</td>    
                          <td>{{$b->book_stock}}</td>
                          <td>
                              <img src="{{url('uploads/'.$b->book_pict)}}" alt="Foto" class="img-thumbnail" style="width : 100%; max-widht: 250px">
                          </td>
                          <td>
                              @if($b->book_status == 1)
                                <span class="badge badge-primary">Available</span>
                              @elseif($b->book_status == 0)
                              <span class="badge badge-danger">Not Available</span>
                              @endif
                          </td>
                          <td>
                                  <a href="{{route('book.edit',$b)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                  <form action="{{route('book.destroy',$b)}}" method="post">
                                      @csrf @method('delete')
                                      <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  </form>
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
