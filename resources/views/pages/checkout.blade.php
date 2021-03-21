@extends ('layouts.app')

@section('content')
<div>
    <h1>{{$title}}</h1>
    <p> Your bill is  </p>
</div>
<hr>
<a href="/payments" class="btn btn-outline-success me-2">Back</a>
@endsection
