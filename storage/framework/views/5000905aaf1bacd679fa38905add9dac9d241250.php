<?php $__env->startSection('main_container'); ?>


<h4><b>Create Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters">
            <h5>Personal Information</h5>
        </div>
    	<ul class="list-group">
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Name:</label><?php echo e($person->name); ?>

			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Country:</label><?php echo e($person->country_name); ?>

			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">City:</label><?php echo e($person->city_name); ?>

			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Language Skills :</label><?php echo e($person->languages); ?>

			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Date of Birth:</label><?php echo e($person->dob); ?>

			</li>
			<li class="list-group-item">
				<label class="font-weight-bold mr-2">Resume File:</label><?php echo e($person->resume_filename); ?>

			</li>
		</ul>
		<div class="form-group mt-3">
			<label></label>
			<a href="<?php echo e(URL::to('/')); ?>" class="btn btn-success float-right">List Page</a>
		</div>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mat_laravel/resources/views/view.blade.php ENDPATH**/ ?>