<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<?php echo e(csrf_field()); ?>

		<div class="animated fadeIn">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							<strong>VISA</strong>
						</div>
						<div class="card-body">
							Apply
						</div>
						<div class="card-footer-right">
							<a href="/assessment/visa" class="btn btn-primary">Click Here</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							<strong>Study</strong>
						</div>
						<div class="card-body">
							Apply
						</div>
						<div class="card-footer-right">
							<a href="/assessment/study" class="btn btn-primary">Click Here</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<strong>Latest Status of Activities</strong>
						</div>
						<div class="card-body">
						<table class="table table-responsive-sm">
							<thead>
								<tr>
									<th width="200">Date</th>
									<th width="500">Detail</th>
									<th width="150">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($activities) === 0): ?>
									<tr>
										<td colspan="5">
											&nbsp;
										</td>
									</tr>
								<?php else: ?>
									<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($activity->created_at); ?></td>
											<td>
												<?php if($activity->activity_type == 0): ?>
													<span>Assessment : <?php echo $activity->first_name , " " , $activity->last_name ?></span>
												<?php elseif($activity->activity_type == 1): ?>
													<span>University : <?php echo $activity->first_name , " " , $activity->last_name ?></span>
												<?php elseif($activity->activity_type == 2): ?>
													<span>Pay : <?php echo $activity->first_name , " " , $activity->last_name ?></span>
												<?php elseif($activity->activity_type == 3): ?>
													<span>Upload doc : <?php echo $activity->first_name , " " , $activity->last_name ?></span>
												<?php else: ?>
													<span>Admission : <?php echo $activity->first_name , " " , $activity->last_name ?></span>
												<?php endif; ?>
											</td>
											<td>
												<?php if($activity->status == 0): ?>
													<span class="badge badge-warning" data-id="<?php echo e($activity->id); ?>" data-status="0">Waiting</span>
												<?php elseif($activity->status == 1): ?>
													<span class="badge badge-success" data-id="<?php echo e($activity->id); ?>" data-status="1">Accept</span>
												<?php else: ?>
													<span class="badge badge-secondary" data-id="<?php echo e($activity->id); ?>" data-status="2">Reject</span>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<strong>Recent Transection Detail</strong>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm">
							<thead>
								<tr>
									<th width="200">Date</th>
									<th width="500">Detail</th>
									<th width="150">Price</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($transactions) === 0): ?>
									<tr>
										<td colspan="5">
											&nbsp;
										</td>
									</tr>
								<?php else: ?>
									<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($transaction->created_at); ?></td>
											<td>
												<span><?php echo $transaction->assessment_type==0?'Visa':'Study' ?> : <?php echo $transaction->first_name , " " , $transaction->last_name ?></span>
											</td>
											<td>
												<span class="span-price"><?php echo $transaction->pay_price ?>$ CAD</span>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<strong>Lates Messsages</strong>
					</div>
					<div class="card-body">
						<input type="hidden" name="id" value="">
						<input type="hidden" name="activity_id" value="">
						<input type="hidden" name="activity_type" value="">
						<input type="hidden" name="assessment_type" value="">
						<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="card">
								<div class="card-body">
									<div class="message-date">
										<div class="row">
											<div id="date-<?php echo e($message->id); ?>" class="col-md-3"><?php echo $message->created_at ?></div>
											<div id="type-<?php echo e($message->id); ?>" class="col-md-3">
												<?php
													if ($message->activity_type == 0)
														echo 'Assessment';
													elseif ($message->activity_type == 1)
														echo 'University';
													elseif ($message->activity_type == 2)
														echo 'Pay';
													elseif ($message->activity_type == 3)
														echo 'Upload doc';
													elseif ($message->activity_type == 4)
														echo 'admission';

													echo ' : ';
													echo $message->status;
													if ($message->status == 0)
														echo 'Waiting';
													elseif ($message->status == 1)
														echo 'Accept';
													elseif ($message->status == 2)
														echo 'Reject';
												?>
											</div>
											<div id="name-<?php echo e($message->id); ?>" class="col-md-4"><?php echo $message->first_name, " ", $message->last_name ?></div>
											<div class="col-md-2">
												<div class="card-footer-right">
													<?php if($message->status==1): ?>
														<button data-id="<?php echo e($message->id); ?>" data-type="<?php echo e($message->activity_type); ?>"
																data-activity-id="<?php echo e($message->activity_id); ?>" data-assessment-type="<?php echo e($message->assessment_type); ?>"
																class="btn btn-primary btn-next">Next</button>
													<?php elseif($message->status==2 || $message->status==0): ?>
														<button data-id="<?php echo e($message->id); ?>" data-activity-id="<?php echo e($message->activity_id); ?>" class="btn btn-secondary btn-reply">Reply</button>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
									<div id="title-<?php echo e($message->id); ?>" class="message-title">
										<?php echo $message->msg_title ?>
									</div>
									<div id="content-<?php echo e($message->id); ?>" class="message-content">
										<?php echo $message->msg_content ?>
									</div>
								</div>
								<div class="card-footer-right">
									<?php if($message->assessment_type == 0): ?>
										<div class="info-visa"><strong>Visa</strong></div>
									<?php else: ?>
										<div class="info-study"><strong>Study</strong></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Reply Message</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<span class="reply-message-title-invalid invalid"></span>
					<textarea class="reply-message-title" style="width: 100%;" placeholder="Enter your reply message title." required></textarea>
					<span class="reply-message-content-invalid invalid"></span>
					<textarea class="reply-message-content" style="width: 100%; height: 100px;" placeholder="Enter your reply message content." required></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-confirm-reply">Reply</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="nextReplyModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Reply Message</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<span class="next-message-title-invalid invalid"></span>
					<textarea class="next-message-title" style="width: 100%;" placeholder="Enter your reply message title." required></textarea>
					<span class="next-message-content-invalid invalid"></span>
					<textarea class="next-message-content" style="width: 100%; height: 100px;" placeholder="Enter your reply message content." required></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-reply-next">Reply</button>
					<button type="button" class="btn btn-secondary btn-reply-next-cancel">Not reply</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="nextModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Next Step</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="show-next-step"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-confirm-next">Next</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
	<script src="<?php echo e(asset('js/views/user/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>