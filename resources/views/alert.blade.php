@if($errors->any())
  @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
  @endforeach
@endif
@if(session('warning'))
    <div class="alert alert-warning">
      {{ session ('warning') }}
    </div>
@endif
@if(session('pesan'))
    <div class="alert alert-success">
      {{ session ('success') }}
    </div>
@endif