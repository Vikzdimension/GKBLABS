@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Add New Employee</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <strong>Whoops!</strong> There were some problems with your input.<br><br>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="{{ route('employees.store') }}" method="POST">
		@method('POST')
	    @csrf
	     <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>First Name:</strong>
	                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Last Name:</strong>
	                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email:</strong>
	                <input type="text" name="email" class="form-control" placeholder="Email" required>
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="row">
					<div class="col">
						<div class="form-check">
							<input class="form-check-input" name="hobbies" type="checkbox" value="tv" id="tv">
						  		<label class="form-check-label" for="tv">
						    		TV
						  		</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies" type="checkbox" value="reading" id="reading">
								<label class="form-check-label" for="reading">
									Reading
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies" type="checkbox" value="coding" id="coding">
								<label class="form-check-label" for="coding">
									Coding
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies" type="checkbox" value="skiing" id="skiing">
								<label class="form-check-label" for="skiing">
									Skiing
								</label>
						</div>
					</div>
					
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
								<label class="form-check-label" for="male">
									Male
								</label>
						</div>
					</div>
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" id="female" value="female">
								<label class="form-check-label" for="female">
									Female
								</label>
						</div>
					</div>
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" id="mix" value="mix">
								<label class="form-check-label" for="mix">
									Other
								</label>
						</div>
					</div>
				</div>
			</div>
			</div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="ep">Upload</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="picture" aria-describedby="ep">
						<label class="custom-file-label" for="picture">Choose file</label>
					</div>
				</div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	                <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
	</form>
</div>
@endsection