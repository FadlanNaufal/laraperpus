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
          <div class="section-body">
           <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                <div class="card">
                     <div class="card-body">
                        <form action="{{route('borrow_detail.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="borrow_id" value="{{$borrow->id}}">
                            <div class="form-group">
								<label for="">Borrower</label>
								<input type="text" class="form-control" name="reader_id" value="{{$borrow->reader['reader_name']}}" disabled>
							</div>
                            <div class="form-group">
								<label for="">Book</label>
								<select name="book_id" id="" class="form-control" required="">
									<option selected disabled=""></option>
									@foreach($book as $i)
										<option value="{{$i->id}}">{{$i->book_name}} // {{$i->book_stock}}</option>
									@endforeach>
								</select>
							</div>
                            <div class="form-group">
								<label for="">Total</label>
								<input type="number" name="total" id="" class="form-control" required min="1">
							</div>
                            <div class="form-group">
								<button class="btn btn-primary">Add To Cart</button>
							</div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="card">
                     <div class="card-body">
                     <table class="table table-bordered">
			        		<thead>
			        			<tr>
			        				<th>No</th>
			        				<th>Item Name</th>
			        				<th>Total</th>
			        				<th>Action</th>
			        			</tr>	
			        		</thead>
			        		<tbody>
			        			@foreach($borrow->detail_borrow as $show)
			        			<tr>
									<td>{{$loop->index+1}}</td>
									<td>{{$show->book->book_name}}</td>
									<td>{{$show->total}}</td>
									<td>
									<form action="{{route('borrow_detail.destroy',$show)}}" method="POST">
										@csrf @method('delete')
										<button class="btn btn-danger">Cancel</button>
									</form>
									</td>
			        			</tr>
			        			@endforeach
			        		</tbody>
			        	</table>
			        	<form action="{{route('borrow.update',$borrow)}}" method="post">
			        		@csrf @method('patch')
                            <button class="btn btn-primary btn-block">Done</button>
			        	</form>

                    </div>
                </div>
                </div>
            </div>
           </div>
        </div>
    </div>


</div>

@endsection
