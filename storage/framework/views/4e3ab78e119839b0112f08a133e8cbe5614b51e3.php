<?php $__env->startSection('main_container'); ?>


<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
		<?php if(session()->has('success')): ?>
	    <div class="alert alert-success" id="success_div">
	        <?php echo e(session()->get('success')); ?>

	    </div>
		<?php endif; ?>
    	<form method="post" name="person_form" action="<?php echo e(URL::to('save_person')); ?>" enctype="multipart/form-data">
    		<?php echo csrf_field(); ?>
			<div class="form-group">
				<label for="exampleInputEmail1" class="font-weight-bold">Name *</label>
				<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(Request::old('name')); ?>" placeholder="Enter Name">
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
				<label for="exampleInputEmail1" class="font-weight-bold">Country *</label>
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
					<option value="<?php echo e($country->id); ?>" <?php if(Request::old('country_id')== $country->id) echo "selected"; ?>><?php echo e($country->name); ?></option>
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
				<label for="exampleInputEmail1" class="font-weight-bold">City *</label>
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
				<label for="exampleInputEmail1" class="font-weight-bold">Language Skills *</label>
				<div class="row no-gutters" id="checkboxDiv">
					<?php $__currentLoopData = $lang_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<input type="checkbox" class="mr-2" id="<?php echo e($lang->id); ?>" name="lang_skills_id[]" value="<?php echo e($lang->id); ?>" <?php if(null!==Request::old('lang_skills_id') && in_array($lang->id,Request::old('lang_skills_id'))) echo "checked"; ?>>
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
				<label for="exampleInputEmail1" class="font-weight-bold">Date of Birth *</label>
				<input type="date" class="form-control <?php $__errorArgs = ['lang_skills_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dob" name="dob" value="<?php echo e(Request::old('dob')); ?>" placeholder="Date of Birth" max="<?php echo date('Y-m-d'); ?>">
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
				<label for="exampleInputEmail1" class="font-weight-bold">Resume File *</label>
				<br>
				<input type="file" class="<?php $__errorArgs = ['resume_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="resume_file" name="resume_file" value="<?php echo e(Request::old('resume_file')); ?>">
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
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			
  			
		</form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_bottom_js'); ?>
<?php if(Request::old('country_id')): ?>
<script type="text/javascript">
	$(document).ready( function () {
		getCitiesByCountry(<?php echo e(Request::old('city_id')); ?>);
	});
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mat_laravel/resources/views/add.blade.php ENDPATH**/ ?>