@extends('layouts.template')
<style>
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 80%; /* Full width */
  height: 80%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 50%;
  max-width: 500px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Book</div>
                <div class="card-body">
                <table class="table">
                <a href="{{route('book.create')}}" class="btn btn-primary">Add</a>
                <br><br>
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
