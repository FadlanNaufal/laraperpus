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
          <a href="{{route('borrow.create')}}" class="btn btn-primary">Add Borrow</a>
          <br><br>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Borrow Date</th>
                          <th>Return Date</th>
                          <th>Returned On</th>
                          <th>Accepted By</th>
                          <th>Borrower</th>
                          <th>Borrow status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->borrow_date}}</td>
            			<td>{{$show->return_date}}</td>
                        <td>{{$show->returned_on}}</td>
                        <td>{{$show->user['name']}}</td>
                        <td>{{$show->reader['reader_name']}}</td>
            			<td>
            				@if($show->borrow_status == "uncomplete")
								<div class="badge badge-warning">Uncomplete</div>
            				@endif
            				@if($show->borrow_status == "book")
								<div class="badge badge-danger">Booked</div>
            				@endif
            				@if($show->borrow_status == "returned")
								<div class="badge badge-primary">returned</div>
            				@endif
            				@if($show->borrow_status == "borrowed")
								<div class="badge badge-info">borrowed</div>
            				@endif
            			</td>
            			@if(Auth::guard('web')->check())
							<td>
								@if($show->borrow_status == "uncomplete")
									<a href="{{route('borrow.show',$show)}}" class="btn btn-primary">Back To Form</a>
								@endif

								@if($show->borrow_status == "borrowed")
									<a href="{{route('borrow_detail.show',$show)}}" class="btn btn-info">Return</a>
                                    <a href="{{route('borrow_detail.edit',$show)}}" class="btn btn-secondary">Detail</a>
								@endif

								@if($show->borrow_status == "returned")
									<div class="badge badge-info">No Action Dude </div>
                                    <div class="badge badge-info">
                                        <a href="{{route('borrow_detail.edit',$show)}}" style="color: white">Detail</a>
                                    </div>
								@endif
							</td>
                        @endif
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
