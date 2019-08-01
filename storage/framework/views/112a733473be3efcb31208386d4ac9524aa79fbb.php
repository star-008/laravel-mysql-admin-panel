<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
    <form action="<?php echo e(route('upload.register')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>">
    <?php echo e(csrf_field()); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong>Upload</strong>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div>
                        <table class="table table-responsive-sm">
                          <thead>
                            <tr>
                                <th width="1000">Name</th>
                                <th width="300">FileName</th>
                                <th>Upload Docs</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(count($docs) === 0): ?>
                              <tr>
                                  <td>&nbsp;
                                  </td>
                              </tr>
                          <?php else: ?>
                              <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td data-doc-name="<?php echo e($doc->docs_req_id); ?>"><?php echo '<script>
                                        jQuery(document).ready(function(){getDocName('.$doc->docs_type.','.$doc->docs_req_id.');})</script>'; ?></td>
                                      <td><span></span></td>
                                      <td>
                                          <input type="file" name="<?php echo e($doc->doc_id); ?>" data-id="<?php echo e($doc->doc_id); ?>" accept="application/pdf,.pdf,image/jpeg,.jpg,image/png,.png" hidden>
                                          <a href="#" class="btn btn-primary btn-upload">Open File</a>
                                      </td>
                                  </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
            <div class="card-footer-right">
                <button id="btn-register" type="submit" class="btn btn-lg btn-primary">Register</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
    <script src="<?php echo e(asset('js/views/user/upload_doc.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>