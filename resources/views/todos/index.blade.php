@extends('layout')

@section('title')
Todos
@endsection
{{-- Tampilkan pesan sukses dari flash session setelah melakukan proses --}}
@section('below_navbar')
	@if(session()->has('success')) {{-- session('success') --}}
		@if(session('success')['status'] == 'delete')
			<div class="alert alert-info" role="alert">{{ session('success')['message'] }}</div>
		@elseif(session('success')['status'] == 'insert')
			<div class="alert alert-success" role="alert">{{ session('success')['message'] }}</div>
		@elseif(session('success')['status'] == 'complete')
			<div class="alert alert-primary" role="alert">{{ session('success')['message'] }}</div>
		@elseif(session()->get('success')['status'] == 'update')
			<div class="alert alert-warning" role="alert">{{ session()->get('success')['message'] }}</div> {{-- syntax lain --}}
		@endif
	@endif
@endsection

@section('content')

@section('h1_title')
TODOS Page
@endsection


<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card card-default">
			<div class="card-header">List of Todos</div>
			<div class="card-body">
				<ul class="list-group">
					@foreach($todos as $todo)
					<li class="list-group-item">{{$todo->name}} 
						<div class="float-right">
							@if($todo->completed == false)
							<a href="complete/{{$todo->id}}" class="btn btn-success btn-sm">Complete Todo</a>
							@endif
							<a href="todo/{{$todo->id}}" class="btn btn-primary btn-sm">View</a>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
