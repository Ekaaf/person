@extends('layout.master')

@section('main_container')


<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
    	<ul class="list-group">
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Name:</label>{{$person->name}}
			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Country:</label>{{$person->country_name}}
			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">City:</label>{{$person->city_name}}
			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Language Skills :</label>{{$person->languages}}
			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Date of Birth:</label>{{$person->dob}}
			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Resume File:</label>{{$person->resume_filename}}
			</li>
		</ul>
		<div class="form-group mt-3">
			<label></label>
			<a href="{{URL::to('/')}}" class="btn btn-success float-right">List Page</a>
		</div>
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