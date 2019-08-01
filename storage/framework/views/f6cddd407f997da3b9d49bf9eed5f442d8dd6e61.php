<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <input type="hidden" name="id" value="<?php echo $activity_id; ?>">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong>Select University</strong>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="row">
                    <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-header-right">
                            <div class="university-price"><strong><?php echo e($university->tuition); ?>$</strong></div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="university-img"><img src="<?php echo e(asset('img/favicon.png')); ?>"></div>
                              <div>
                                <div class="university-title"><strong><?php echo e($university->university_name); ?></strong></div>
                                <div class="university-kind">
                                  <span>
                                    <?php if($university->university_type == 0): ?>
                                      university
                                    <?php elseif($university->university_type == 1): ?>
                                      college
                                    <?php else: ?>
                                      school
                                    <?php endif; ?>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="university-date"><strong>Start Date: <?php echo e($university->start_date); ?></strong></div>
                            </div>
                          </div>
                          <div class="card-footer-right">
                            <button data-id="<?php echo e($university->university_id); ?>" class="btn btn-lg btn-flickr text btn-apply">Apply</button>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
  <script src="<?php echo e(asset('js/views/user/university.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>