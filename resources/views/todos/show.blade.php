@extends('layout')

@section('title')
Todo: {{ $todo->name }}
@endsection

@section('content')

@section('h1_title')
{{ $todo->name }}	
@endsection

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card card-default">
			<div class="card-header">Detail</div>
			<div class="card-body">
				<ul class="list-group">
					{{ $todo->description }}
				</ul>
			</div>
		</div>
		<a href="/todo/{{ $todo->id }}/edit" class="btn btn-info my-2">Edit</a>
		<a href="/todo/{{ $todo->id }}/delete" class="btn btn-danger my-2 float-right ">Delete</a>
	</div>
</div>

@endsection
