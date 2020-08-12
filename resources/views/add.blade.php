@extends('layout.master')

@section('main_container')


<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
		@if(session()->has('success'))
	    <div class="alert alert-success" id="success_div">
	        {{ session()->get('success') }}
	    </div>
		@endif
    	<form method="post" name="person_form" action="{{URL::to('save_person')}}" enctype="multipart/form-data">
    		@csrf
			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Name *</label>
				<input type="text" class="form-control @error('name')error @enderror" id="name" name="name" value="{{Request::old('name')}}" placeholder="Enter Name">
				@error('name')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Country *</label>
				<select class="form-control @error('country_id')error @enderror" id="country_id" name="country_id" onchange="getCitiesByCountry();">
					<option value="">Select Country</option>
					@foreach($countries as $country)
					<option value="{{$country->id}}" <?php if(Request::old('country_id')== $country->id) echo "selected"; ?>>{{$country->name}}</option>
					@endforeach
				</select>
				@error('country_id')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>
 			
 			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">City *</label>
				<select class="form-control @error('city_id')error @enderror" id="city_id" name="city_id">
					<option value="">Select City</option>
				</select>
				@error('city_id')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Language Skills *</label>
				<div class="row no-gutters" id="checkboxDiv">
					@foreach($lang_skills as $lang)
					<input type="checkbox" class="mr-2" id="{{$lang->id}}" name="lang_skills_id[]" value="{{$lang->id}}" <?php if(null!==Request::old('lang_skills_id') && in_array($lang->id,Request::old('lang_skills_id'))) echo "checked"; ?>>
					<label class="form-check-label mr-2" for="inlineCheckbox1" style="margin-top: -6px;">{{$lang->language}}</label>
					@endforeach
				</div>
				@error('lang_skills_id')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>

			

			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Date of Birth *</label>
				<input type="date" class="form-control @error('lang_skills_id')error @enderror" id="dob" name="dob" value="{{Request::old('dob')}}" placeholder="Date of Birth" max="<?php echo date('Y-m-d'); ?>">
				@error('dob')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>


			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Resume File *</label>
				<br>
				<input type="file" class="@error('resume_file')error @enderror"  id="resume_file" name="resume_file" value="{{Request::old('resume_file')}}">
				@error('resume_file')
				<div class="error">{{ $message }}</div>
				@enderror
			</div>

			<div class="d-flex justify-content-end" >
				<a href="{{URL::to('/')}}" class="btn btn-success mr-2">List Page</a>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			
  			
		</form>
    </div>
</div>

@endsection

@section('page_bottom_js')
@if(Request::old('country_id'))
<script type="text/javascript">
	$(document).ready( function () {
		getCitiesByCountry({{Request::old('city_id')}});
	});
</script>
@endif
@endsection