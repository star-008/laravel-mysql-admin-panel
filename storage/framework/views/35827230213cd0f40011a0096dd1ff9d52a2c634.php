<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong>Users</strong>
						</div>
						<div class="card-body">
							<form id="mainForm" name="mainForm" class="form" method="POST">
								<?php echo e(csrf_field()); ?>


								<input type="hidden" name="id" value="">
								
								<table class="table table-responsive-sm table-bordered">
									<colgroup>
										<col width="80px">
										<col>
										<col>
										<col>
										<col width="200px">
									</colgroup>
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Use Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if(count($users) === 0): ?>
											<tr>
												<td colspan="5">
													&nbsp;There is nothing.
												</td>
											</tr>
										<?php else: ?>
											<?php
												$firstIndex = ($users->currentPage() - 1) * $users->perPage();
											?>
											<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($firstIndex + $loop->index + 1); ?></td>
													<td><?php echo e($user->name); ?></td>
													<td><?php echo e($user->email); ?></td>
													<td>
														<?php if($user->use_status == 0): ?>
															<span class="badge badge-secondary">Inactive</span>
														<?php else: ?>
															<span class="badge badge-success">Active</span>
														<?php endif; ?>
													</td>
													<td>
														<?php if($user->use_status == 0): ?>
															<a href="#" class="btn btn-success btn-status" data-id="<?php echo e($user->id); ?>" data-status="1">Enable</a>
														<?php else: ?>
															<a href="#" class="btn btn-danger btn-status" data-id="<?php echo e($user->id); ?>" data-status="0">Disable</a>
														<?php endif; ?>
														<a href="#" class="btn btn-secondary btn-delete" data-id="<?php echo e($user->id); ?>">Delete</a>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</tbody>
								</table>
								<?php echo $__env->make('common.paginator', ['paginator' => $users], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this user?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-confirm-delete">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
	<script src="<?php echo e(asset('js/views/admin/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>