@extends ('layouts.app')

@section('content')


 <form action="{{route('dati')}}" method="POST">
 @csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <!-- important: declare name attribute of input to show data in dd array -->
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 


@endsection