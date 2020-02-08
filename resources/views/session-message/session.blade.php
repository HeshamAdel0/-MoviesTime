{{-- Session Flash Success Messages --}}
@if (Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="alert-heading"><i class="icon fa fa-check"></i> Success!</h3>
      <h4 class="massege_success">{{ Session::get('success') }}</h4>
  </div>
@endif

{{-- Session Flash Error Messages --}}
@if (Session::has('errors'))
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="massege_error"><i class="icon fa fa-ban"></i>{{ $error }}</h4>
    </div>
  @endforeach
@endif
