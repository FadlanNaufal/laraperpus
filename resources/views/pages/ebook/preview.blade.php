@extends('layouts.template')
@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>E-book Preview : {{$ebook->ebook_name}}</h1>
          </div>
          <div class="section-body">
            <div class="card">
                    <iframe autoplay="" src="{{url('uploads/pdf/'.$ebook->ebook_file.'#toolbar=0')}}" type="application/pdf" width="100%" style="min-height : 500px"></iframe>
            </div>
        </div>
    </div>


</div>

@endsection
