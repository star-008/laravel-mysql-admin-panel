<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong>Invoice List</strong>
						</div>
						<div class="card-body">
							<form id="mainForm" name="mainForm" class="form" method="POST">
								<?php echo e(csrf_field()); ?>

								<table class="table table-responsive-sm table-bordered">
									<thead>
									<tr>
										<th width="50">No</th>
										<th width="300">Name</th>
										<th width="600">Title</th>
										<th width="200">Read?</th>
										<th width="300">Date</th>
										<th width="200">Registrant</th>
										<th width="200">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php if(count($invoices) === 0): ?>
										<tr>
											<td colspan="6">
												There is nothing.
											</td>
										</tr>
									<?php else: ?>
										<?php
										$index = ($invoices->currentPage() - 1) * $invoices->perPage() + 1;
										foreach ($invoices as $item) {
										?>
										<tr>
											<td><?php echo e($index); ?></td>
											<td>
												<a href="/admin/assessment_category/detail/<?php echo e($item->assessment_id); ?>"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></a>
											</td>
											<td><?php echo e($item->msg_title); ?></td>
											<td><?php echo e($item->isBrowsed? 'Yes': 'No'); ?></td>
											<td><?php echo e($item->created_at); ?></td>
											<td><?php echo e($item->user_name); ?></td>
											<td>
												<a href="javascript:;" class="btn btn-primary btn-detail" data-msg-id="<?php echo e($item->id); ?>">Details</a>
												<a href="javascript:;" class="btn btn-danger btn-reply" data-msg-id="<?php echo e($item->id); ?>">Reply</a>
											</td>
										</tr>
										<?php
										$index ++;
										}
										?>
									<?php endif; ?>
									</tbody>
								</table>
								<?php echo $__env->make('common.paginator', ['paginator' => $invoices], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Detail</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="assessment_name">Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="assessment_name" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="activityType">Activity Type</label>
						<div class="col-md-10">
							<input name="activity_type" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="status">Status</label>
						<div class="col-md-10">
							<input name="status" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="msg_title">Message Title</label>
						<div class="col-md-10">
							<input name="msg_title" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="msg_content">Message Content</label>
						<div class="col-md-10">
							<textarea name="msg_content" rows="5" class="form-control" readonly></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="created_at">Date Time</label>
						<div class="col-md-10">
							<input name="created_at" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="registrant">Registrant</label>
						<div class="col-md-10">
							<input name="registrant" class="form-control" readonly>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Reply</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" id="inputMsgId">
					<div class="form-group row">
						<strong class="col-12 form-col-form-label">Message</strong>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="msg_title">title</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="msg_title" placeholder="title">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="txtMsgContent">content</label>
						<div class="col-md-10">
							<textarea id="msg_content" rows="5" class="form-control" placeholder="message.."></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-send" data-dismiss="modal">Send</button>
					<button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
	<script src="<?php echo e(asset('js/views/admin/invoice_list.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>