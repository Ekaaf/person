<?php $__env->startSection('main_container'); ?>
<?php
	if(Request::old('country_id')){
		$person->country_id = Request::old('country_id');
	}
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

<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
    	<form method="post" name="person_form" action="<?php echo e(URL::to('save_person')); ?>" enctype="multipart/form-data">
    		<?php echo csrf_field(); ?>
    		<input type="hidden" name="id" id="id" value="<?php echo e($person->id); ?>">
			<div class="form-group">
				<label for="exampleInputEmail1">Name *</label>
				<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo (Request::old('name'))? Request::old('name') : $person->name ?>" placeholder="Enter Name">
				<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Country *</label>
				<select class="form-control <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="country_id" name="country_id" onchange="getCitiesByCountry();">
					<option value="">Select Country</option>
					<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($country->id); ?>" <?php if($person->country_id== $country->id) echo "selected"; ?>><?php echo e($country->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				<?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>
 			
 			<div class="form-group">
				<label for="exampleInputEmail1">City *</label>
				<select class="form-control <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="city_id" name="city_id">
					<option value="">Select City</option>
				</select>
				<?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">Language Skills *</label>
				<div class="row no-gutters" id="checkboxDiv">
					<?php $__currentLoopData = $lang_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<input type="checkbox" class="mr-2" id="<?php echo e($lang->id); ?>" name="lang_skills_id[]" value="<?php echo e($lang->id); ?>" <?php if(null!==$person->lang_skills_id && in_array($lang->id,$person->lang_skills_id)) echo "checked"; ?>>
					<label class="form-check-label mr-2" for="inlineCheckbox1" style="margin-top: -6px;"><?php echo e($lang->language); ?></label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php $__errorArgs = ['lang_skills_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>

			

			<div class="form-group">
				<label for="exampleInputEmail1">Date of Birth *</label>
				<input type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dob" name="dob" value="<?php echo (Request::old('dob'))? Request::old('dob') : $person->dob ?>" placeholder="Date of Birth" max="<?php echo date('Y-m-d'); ?>">
				<?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>


			<div class="form-group">
				<label for="exampleInputEmail1">Resume File</label>
				<br>
				<input type="file" class="<?php $__errorArgs = ['resume_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="resume_file" name="resume_file">
				<label class="custom-file-label" for="customFile">Resume Upload</label>
				<?php $__errorArgs = ['resume_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<div class="error"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>
			
			<div class="d-flex justify-content-end" >
				<a href="<?php echo e(URL::to('/')); ?>" class="btn btn-success mr-2">List Page</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
			
  			
		</form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_bottom_js'); ?>
<script type="text/javascript">
	$(document).ready( function () {
		getCitiesByCountry(<?php echo e($person->city_id); ?>);
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mat_laravel/resources/views/edit.blade.php ENDPATH**/ ?>