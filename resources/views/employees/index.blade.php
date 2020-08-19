@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	<div class="card" style="width: 69.5rem;">
	  	<div class="card-body" align="center">
			<h1>WELCOME TO EMPLOYEE DASHBOARD</h1>
	 	</div>
	</div>
	 	<div>
	 		<a  style="margin:5px" href="{{ route('employees.create') }}" type="button" class="btn btn-primary">Create New Employee</a>
	 	</div>

	    <div class="form-group">
	        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
	            <span class="badge badge-info">Sample .CSV</span>
	            <br>
	            @csrf
	            <input type="file" name="file" required class="form-control" accept=".csv,.xlsx" multiple>
	            <br>
	            <div><button class="btn btn-primary btn-sm">Import Student Data</button>
	            <a class="btn btn-secondary btn-sm" href="{{ route('export') }}">Export Student Data</a>
	            </div>
	        </form>
	    </div>
	    
	<table class="table table-bordered">
		<tr style="text-align:center;">
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Hobbies</th>
			<th>Gender</th>
			<th>Picture</th>
			<th>Action</th>
		</tr>
		@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->id }}</td>
			<td>{{ $employee->first_name }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->email }}</td>
			<td>{{ $employee->hobbies }}</td>
			<td>{{ $employee->gender }}</td>
            <!-- <td><img src="{{ $employee->Picture }}" alt="" border=3 height=100 width=100></img></tr> -->
           	<td>{{ $employee->picture }}</td>
           	<td>
           		<form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
           			<a class="btn btn-sm btn-primary" href="{{ route('employees.edit', $employee->id) }}">EDIT</a>
           			@method('DELETE')
           			@csrf
           			<button type="submit" class="btn btn-sm btn-danger">DELETE</button>
           		</form>
           	</td>
		@endforeach
	</table>
</div>
@endsection
