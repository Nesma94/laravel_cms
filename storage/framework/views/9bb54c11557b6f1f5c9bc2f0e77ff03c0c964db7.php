<?php $__env->startSection('content'); ?>

<h1>Contact page</h1>
<?php if(count($people)): ?>
<ul>


<?php foreach($people as $person): ?>
<li> <?php echo e($person); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<script> alert("hello");</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>