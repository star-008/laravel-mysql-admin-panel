<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="<?php echo e(route('admission.confirm')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Confirm Admission</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="confirm-admission">
                                                <div class="col-md-12">
                                                    <a href="<?php echo e(asset($file_url)); ?>" class="btn btn-download btn-primary" target="_blank" download>Download</a>
                                                    <img style="margin-top: 10px; width: 100%; height: 100%;" src="<?php echo e(asset($file_url)); ?>">
                                                </div>
                                                <div class="col-md-12" style="margin-top: 20px;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="card-footer-right">
                                <button type="submit" class="btn btn-lg btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>