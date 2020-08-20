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
	           	@method('POST')
				@csrf
	            <input type="file" name="file" required class="form-control" accept=".csv,.xlsx" multiple>
	            <br>
	            <div><button class="btn btn-primary btn-sm">Import Employee Data</button>
	            <a class="btn btn-secondary btn-sm" href="{{ route('export') }}">Export Employee Data</a>
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
			<th style="" >Action</th>
		</tr>
		@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->id }}</td>
			<td>{{ $employee->first_name }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->email }}</td>
			<td>{{ $employee->hobbies }}</td>
			<td>{{ $employee->gender }}</td>
            <!-- <td><img src="{{ $employee->Picture }}" alt="" border=3 height=30 width=30></img></tr> -->
           	<td>{{ $employee->picture }}</td>
           	<td>
           		<form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
           			<a class="btn btn-sm btn-primary" href="{{ route('employees.edit', $employee->id) }}">EDIT</a>
           			@method('DELETE')
           			@csrf
           			<!-- <button type="submit" class="btn btn-sm btn-danger">DELETE</button> -->
           			<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
					  DELETE
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					      		<div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">DELETE EMPLOYEE</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          	<span aria-hidden="true">&times;</span>
							        </button>
					      		</div>
								<div class="modal-body">
									Are you sure you want to delete your employee?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
									<button type="submit" class="btn btn-primary">DELETE</button>
								</div>
					    	</div>
					  	</div>
					</div>
           		</form>

           	</td>
		@endforeach
	</table>
{{ $employees->links() }}
<p>
    Displaying {{$employees->count()}} of {{ $employees->total() }} employee(s).
</p>
</div>
@endsection
