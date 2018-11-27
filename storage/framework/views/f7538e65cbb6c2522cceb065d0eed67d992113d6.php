<?php $__env->startSection('content'); ?>

<h1>Post page <?php echo e($id); ?> <?php echo e($name); ?>

</h1>

<?php echo $__env->yieldSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>