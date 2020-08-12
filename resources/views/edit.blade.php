@extends('layout.master')

@section('main_container')


<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
    	<form method="post" action="{{URL::to('save_person')}}" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" id="id" value="{{$person->id}}">
			<div class="form-group">
				<label for="exampleInputEmail1">Name *</label>
				<input type="text" class="form-control" id="name" name="name" value="<?php echo (Request::old('name'))? Request::old('name') : $person->name ?>" placeholder="Enter Name">
				@error('name')
				<div class="alert alert-danger" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<?php
				if(Request::old('country_id')){
					$person->country_id = Request::old('country_id');
				}
			?>
			<div class="form-group">
				<label for="exampleInputEmail1">Country *</label>
				<select class="form-control" id="country_id" name="country_id" onchange="getCitiesByCountry();">
					<option value="">Select Country</option>
					@foreach($countries as $country)
					<option value="{{$country->id}}" <?php if($person->country_id== $country->id) echo "selected"; ?>>{{$country->name}}</option>
					@endforeach
				</select>
				@error('country_id')
				<div class="alert alert-danger" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>
 			
 			<?php
				if(Request::old('city_id')){
					$person->city_id = Request::old('city_id');
				}
				if(Request::old('lang_skills_id')){
					$person->lang_skills_id = Request::old('lang_skills_id');
				}
				else{
					$person->lang_skills_id = explode(",", $person->lang_skills_id);
				}

			?>
 			<div class="form-group">
				<label for="exampleInputEmail1">City *</label>
				<select class="form-control" id="city_id" name="city_id">
					<option value="">Select City</option>
				</select>
				@error('city_id')
				<div class="alert alert-danger" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">Language Skills *</label>
				<div class="row no-gutters">
					@foreach($lang_skills as $lang)
					<input type="checkbox" class="mr-2" id="{{$lang->id}}" name="lang_skills_id[]" value="{{$lang->id}}" <?php if(null!==$person->lang_skills_id && in_array($lang->id,$person->lang_skills_id)) echo "checked"; ?>>
					<label class="form-check-label mr-2" for="inlineCheckbox1" style="margin-top: -6px;">{{$lang->language}}</label>
					@endforeach
				</div>
				@error('lang_skills_id')
				<div class="alert alert-danger" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			

			<div class="form-group">
				<label for="exampleInputEmail1">Date of Birth *</label>
				<input type="date" class="form-control" id="dob" name="dob" value="<?php echo (Request::old('dob'))? Request::old('dob') : $person->dob ?>" placeholder="Date of Birth">
				@error('dob')
				<div class="alert alert-danger" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>


			<div class="form-group">
				<label for="exampleInputEmail1">Resume File *</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="resume_file" name="resume_file">
					<label class="custom-file-label" for="customFile">Resume Upload</label>
					@error('resume_file')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			
			<div class="d-flex justify-content-end" >
				<a href="{{URL::to('/')}}" class="btn btn-success mr-2">List Page</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
			
  			
		</form>
    </div>
</div>

@endsection

@section('page_bottom_js')
<script type="text/javascript">
	$(document).ready( function () {
		getCitiesByCountry({{$person->city_id}});
	});
</script>
@endsection