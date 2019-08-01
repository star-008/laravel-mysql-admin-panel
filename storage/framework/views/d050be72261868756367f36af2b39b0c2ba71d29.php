<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong>Admission List</strong>
            </div>
            <div class="card-body">
              <form id="mainForm" name="mainForm" class="form" method="POST">
                <?php echo e(csrf_field()); ?>

                <table class="table table-responsive-sm table-bordered">
                  <thead>
                  <tr>
                    <th width="30">No</th>
                    <th width="200">Name</th>
                    <th width="100">Type</th>
                    <th width="200">University</th>
                    <th width="150">Pay Price(CAD)</th>
                    <th width="400">Upload Docs</th>
                    <th width="200">Date</th>
                    <th width="100">Registrant</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(count($admissions) === 0): ?>
                    <tr>
                      <td colspan="8">
                        There is nothing.
                      </td>
                    </tr>
                  <?php else: ?>
                    <?php
                    $index = ($admissions->currentPage() - 1) * $admissions->perPage() + 1;
                    foreach ($admissions as $item) {
                    ?>
                    <tr>
                      <td><?= $index ?></td>
                      <td>
                        <a href="/admin/assessment_category/detail/<?php echo e($item->assessment_id); ?>"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></a>
                      </td>
                      <?php
                      $type = $item->assessment_type;
                      $str_type = "";
                      switch ($type) {
                        case 0:
                          $str_type = "Visa";
                          break;
                        case 1:
                          $str_type = "Study";
                          break;
                      }
                      ?>
                      <td><?php echo e($str_type); ?></td>
                      <td><?php echo e($item->university_name); ?></td>
                      <td><?php echo e($item->fee_price); ?></td>
                      <td>
                        <a href="javascript:;" class="btn btn-docs" data-id="<?php echo e($item->assessment_id); ?>"><?php echo e($item->docs_name); ?></a>
                      </td>
                      <td><?php echo e($item->updated_at); ?></td>
                      <td><?php echo e($item->user_name); ?></td>
                    </tr>
                    <?php
                    $index++;
                    }
                    ?>
                  <?php endif; ?>
                  </tbody>
                </table>
                <?php echo $__env->make('common.paginator', ['paginator' => $admissions], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Document List</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <?php echo e(csrf_field()); ?>

              <table class="table table-responsive-sm" id="tableDocs">
                <thead>
                <tr>
                  <th>Requirement</th>
                  <th width="150px">File</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
  <script src="<?php echo e(asset('js/views/admin/admission_list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>