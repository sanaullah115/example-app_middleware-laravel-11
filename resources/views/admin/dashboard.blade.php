<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Welcome</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>



{{Auth::user()->name}}

<h1>admin</h1>
<a href="{{route('logout')}}">logout</a>
