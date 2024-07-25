<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>
	<div id="main">
		<h1>Tasks</h1>
		<?php if ($errors): ?>
			<p class='messages'> </p>
		<?php endif; ?>

		<?php foreach (($tasks?:[]) as $item): ?>
			<article>
				<p><?= (nl2br($item['content'])) ?></p>
			</article>
		<?php endforeach; ?>
	</div>
<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>