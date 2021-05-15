<?php $__env->startSection('title', 'HomePage'); ?>

<?php $__env->startSection('content'); ?>
    <h3>Welcome <?php echo e($name); ?> <?php echo $surname; ?> !</h3>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/structure/Public/views/home.blade.php ENDPATH**/ ?>