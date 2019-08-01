<?php
	$perPage = $paginator->perPage();
	$currentPage = $paginator->currentPage();
	$lastPage = $paginator->lastPage();

	$prevPage = ($currentPage > 1) ? $currentPage - 1 : 1;
	$nextPage = ($currentPage < $lastPage) ? $currentPage + 1 : $lastPage;

	$startPage = $currentPage - ($currentPage % 5) + 1;
	$endPage = $startPage + 4;
	if ($endPage > $lastPage)
		$endPage = $lastPage;
?>
<?php if ($paginator->total() > 0) { ?>
<ul class="pagination">
	<?php if($currentPage > 1): ?>
		<li class="page-item"><a class="page-link" href="javascript:;" data-page="<?= $currentPage - 1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php for($i=$startPage; $i<=$endPage; $i++): ?>
		<li class="page-item <?php if ($i == $currentPage) echo 'active' ?>"><a class="page-link" href="javascript:;" data-page="<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
	<?php endfor; ?>

	<?php if($currentPage < $lastPage): ?>
		<li class="page-item"><a class="page-link" href="javascript:;" data-page="<?= $currentPage + 1 ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php } ?>
<input type="hidden" name="currentPage" value="<?php echo e($currentPage); ?>">
<input type="hidden" name="perPage" value="<?php echo e($perPage); ?>">