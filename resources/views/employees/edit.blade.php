@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
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

    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
        @method('PUT')        
        @csrf
		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="row">
		        	@php $hobbies = explode(',',$employee['hobbies']); @endphp
					<div class="col">
						<div class="form-check">
							<input class="form-check-input" name="hobbies[]" type="checkbox" value="{{  (($employee->hobbies == 'tv') ? 'checked' : '') }}" id="tv">
							@if(in_array('tv',$hobbies)) checked @endif
						  		<label class="form-check-label" for="tv">
						    		TV
						  		</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies[]" type="checkbox" value="{{  ($employee->hobbies == 'reading' ? ' checked' : '') }}"  id="reading">
							@if(in_array('reading',$hobbies)) checked @endif
								<label class="form-check-label" for="reading">
									Reading
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies[]" type="checkbox" value="{{  ($employee->hobbies == 'coding' ? ' checked' : '') }}" id="coding">
							@if(in_array('coding',$hobbies)) checked @endif
								<label class="form-check-label" for="coding">
									Coding
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="hobbies[]" type="checkbox" value="{{  ($employee->hobbies == 'skiing' ? ' checked' : '') }}" id="skiing">
							@if(in_array('skiing',$hobbies)) checked @endif
								<label class="form-check-label" for="skiing">
									Skiing
								</label>
						</div>
					</div>
					
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" id="male" value="{{ $employee->gender }}" checked>
								<label class="form-check-label" for="male">
									Male
								</label>
						</div>
					</div>
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" id="female" value="{{ $employee->gender }}">
								<label class="form-check-label" for="female">
									Female
								</label>
						</div>
					</div>
					<div class="col">
						<div>
							<input class="form-check-input" type="radio" name="gender" @if($employee['gender'] == 'mix') checked @endif id="mix" value="{{ $employee->gender }}">
								<label class="form-check-label" for="mix">
									Other
								</label>
						</div>
					</div>
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