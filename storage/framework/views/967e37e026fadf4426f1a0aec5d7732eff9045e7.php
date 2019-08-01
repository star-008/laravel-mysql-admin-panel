<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="animated fadeIn">				
		<div class="row">
			<div class="col-lg-6">			      		
				<div class="card">
					<div class="card-header">
						<strong>Recent Transection Detail</strong>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm">
							<thead>
								<tr>
									<th>Name</th>
									<th>Fee(CAD)</th>
									<th>Date</th>
									<th>Type</th>
									<th>Worker</th>
								</tr>
							</thead>
							<tbody>
							<?php if(count($transactions) === 0): ?>
								<tr>
									<td colspan="5"></td>
								</tr>
							<?php else: ?>
								<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<span><?php echo $transaction->first_name , " " , $transaction->last_name ?></span>
										</td>
										<td>
											<span class="span-price"><?php echo $transaction->pay_price ?>$</span>
										</td>
										<td><?php echo e($transaction->created_at); ?></td>
										<td><?php echo $transaction->assessment_type==0?'Visa':'Study' ?></td>
										<td><?php echo e($transaction->worker); ?></td>
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
						<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="message-date col-md-3">
											<?php echo $message->created_at ?>
										</div>
										<div class="col-md-3">
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

										echo ' : ', $message->status==1?'Accept':'Reject';
										?>
									</div>
										<div class="col-md-6">
											<?php echo $message->first_name, " ", $message->last_name ?>
										</div>
									</div>
									<div class="message-title">
										<?php echo $message->msg_title ?>
									</div>
									<div class="message-content">
										<?php echo $message->msg_content ?>
									</div>
								</div>
								<div class="card-footer-right">
									<div class="info-study"><strong><?php echo $message->assessment_type==0?'Visa':'Study' ?></strong></div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>