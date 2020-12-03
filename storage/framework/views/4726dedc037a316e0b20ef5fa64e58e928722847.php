<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(session('status')): ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card">
                        <a href="/item/<?php echo e($item->id); ?>" class="card-header text-success"><?php echo e($item->name); ?></a>
                        <div class="card-body">
                            <img src="<?php echo e($item->imageUrl); ?>" alt="<?php echo e($item->imageUrl); ?>" class="img-fluid">
                            <div class="container mt-3">
                                <div id="numbers"><?php echo e("IDR " . number_format($item->price, 0,'.', '.')); ?></div>
                                <a href="/item/<?php echo e($item->id); ?>" class="btn btn-success">Product Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pagination justify-content-center mt-3">
        <?php echo e($items); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel 7\lab-project\resources\views/home.blade.php ENDPATH**/ ?>