@extends('layouts.template')
@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>E-Book</h1>
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
          <a href="{{route('ebook.create')}}" class="btn btn-primary">Add E-Book</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>E-Book Name</th>
                          <th>E-Book File</th>
                          <th>E-Book Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($ebook as $b)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{$b->ebook_name}}</td>
                          <td>{{$b->ebook_file}}</td>
                          <td>
                              @if($b->ebook_status == 1)
                                <span class="badge badge-primary">Available</span>
                              @elseif($b->ebook_status == 0)
                              <span class="badge badge-danger">Not Available</span>
                              @endif
                          </td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{route('ebook.edit',$b)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                  <a target="_blank" href="{{route('ebook.show',$b)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                  <form action="{{route('ebook.destroy',$b)}}" method="post">
                                      @csrf @method('delete')
                                      <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  </form>
                              </div>
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
