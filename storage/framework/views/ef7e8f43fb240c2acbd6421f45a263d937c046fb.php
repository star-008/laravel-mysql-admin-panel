<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Uploaded Docs List</strong>
                        </div>
                        <div class="card-body">
                            <form id="mainForm" name="mainForm" class="form" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <table class="table table-responsive-sm table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="35px">No</th>
                                        <th width="200px">Name</th>
                                        <th width="100px">Type</th>
                                        <th>Files</th>
                                        <th width="200px">Date</th>
                                        <th width="100px">Registrant</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($activities) === 0): ?>
                                        <tr>
                                            <td colspan="7">
                                                There is nothing.
                                            </td>
                                        </tr>
                                    <?php else: ?>
										<?php
										$index = ($activities->currentPage() - 1) * $activities->perPage() + 1;
										foreach ($activities as $activity) {
										?>
                                        <tr>
                                            <td><?= $index ?></td>
                                            <td>
                                                <a href="/admin/assessment_category/detail/<?php echo e($activity->assessment_id); ?>"><?php echo e($activity->first_name); ?> <?php echo e($activity->last_name); ?></a>
                                            </td>
											<?php
											$type = $activity->assessment_type;
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
                                            <td>
                                                <a href="javascript:;" class="btn btn-docs" data-id="<?php echo e($activity->assessment_id); ?>"><?php echo e($activity->docs_name); ?></a>
                                            </td>
                                            <td><?php echo e($activity->created_at); ?></td>
                                            <td><?php echo e($activity->user_name); ?></td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-primary btn-edit btn-accept" data-id="<?php echo e($activity->id); ?>">Accept</a>
                                                <a href="javascript:;" class="btn btn-danger btn-delete btn-reject" data-id="<?php echo e($activity->id); ?>">Reject</a>
                                            </td>
                                        </tr>
										<?php
										$index++;
										}
										?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php echo $__env->make('common.paginator', ['paginator' => $activities], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Accept</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form name="acceptForm" id="acceptForm" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <input type="hidden" id="activity_id" name="activity_id">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="inputImage">Image</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" id="image_name" name="image_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="admissionMsg">Admission Message</label>
                            <div class="col-md-10">
                                <textarea id="admission_msg" name="admission_msg" rows="5" class="form-control" placeholder="message.."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <strong class="col-12 form-col-form-label">Message</strong>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="msg_title">title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="msg_title" name="msg_title" placeholder="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="msg_content">content</label>
                            <div class="col-md-10">
                                <textarea id="msg_content" name="msg_content" rows="5" class="form-control" placeholder="message.."></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-confirm-accept" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reject</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="inputActivityId">
                    <div class="form-group row">
                        <strong class="col-12 form-col-form-label">Message</strong>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="inputMsgTitle">title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="inputMsgTitle" placeholder="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="txtMsgContent">content</label>
                        <div class="col-md-10">
                            <textarea id="txtMsgContent" rows="5" class="form-control" placeholder="message.."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-confirm-reject" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
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
    <script src="<?php echo e(asset('js/views/admin/upload_list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>