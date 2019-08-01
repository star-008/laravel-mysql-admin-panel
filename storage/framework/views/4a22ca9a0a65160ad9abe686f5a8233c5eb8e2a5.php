<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong>Assessment Category</strong>
            </div>
            <div class="card-body">
              <form id="mainForm" name="mainForm" class="form" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="">
                <table class="table table-responsive-sm table-bordered">
                  <thead>
                  <tr>
                    <th width="35">No</th>
                    <th width="80">Type</th>
                    <th width="200">Name</th>
                    <th width="200">Mobile</th>
                    <th width="200">Email</th>
                    <th width="200">Birthday</th>
                    <th width="200">Major/field</th>
                    <th width="200">Registrant</th>
                    <th width="300">Register Date</th>
                    <th width="400px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(count($categories) === 0): ?>
                    <tr>
                      <td colspan="15">
                        There is nothing.
                      </td>
                    </tr>
                  <?php else: ?>
                    <?php
                    $index = ($categories->currentPage() - 1) * $categories->perPage() + 1;
                    foreach ($categories as $category) {
                      $str_assessment_type = '';
                      switch ($category->assessment_type) {
                        case 0:
                          $str_assessment_type = 'Visa';
                          break;
                        case 1:
                          $str_assessment_type = 'Study';
                          break;
                      }
                    ?>
                    <tr>
                      <td><?php echo e($index); ?></td>
                      <td><?php echo e($str_assessment_type); ?></td>
                      <td><?php echo e($category->first_name); ?> <?php echo e($category->last_name); ?></td>
                      <td><?php echo e($category->mobile_phone); ?></td>
                      <td><?php echo e($category->email); ?></td>
                      <td><?php echo e($category->birthday); ?></td>
                      <td><?php echo e($category->major); ?></td>
                      <td><?php echo e($category->user_name); ?></td>
                      <td><?php echo e($category->created_at); ?></td>
                      <td>
                        <a href="/admin/assessment_category/edit/<?php echo e($category->id); ?>" class="btn btn-primary btn-edit">Edit</a>
                        <a href="javascript:;" class="btn btn-danger btn-delete" data-id="<?php echo e($category->id); ?>">Delete</a>
                      </td>
                    </tr>
                    <?php
                    $index++;
                    }
                    ?>
                  <?php endif; ?>
                  </tbody>
                </table>
                <?php echo $__env->make('common.paginator', ['paginator' => $categories], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Assessment</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this assessment?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger btn-confirm-delete">Delete</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
  <script src="<?php echo e(asset('js/views/admin/assessment_category.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>