@extends('layout')

@section('title')
New Todo
@endsection

@section('content')

@section('h1_title')
Create New Todo
@endsection
<form action="/insert" method="POST">
	@csrf

@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger">
			{{ $error }}
		</div>
	@endforeach
@endif

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card card-default">
			<div class="card-header">New Todo</div>
			<div class="card-body">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Study for test">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Study for math test on monday"></textarea>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>

@endsection
