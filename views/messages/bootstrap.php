<?php foreach($messages as $type => $message): ?>

	<div class="alert alert-<?php echo $type; ?>" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
			<?php foreach ($message as $text): ?>
				<?php if(is_array($text)): foreach ($text as $subtext): ?>
					<li><?php echo ucfirst($subtext) ?></li>
				<?php endforeach; else: ?>
					<li><?php echo ucfirst($text) ?></li>
				<?php endif; ?>
			<?php endforeach ?>
		</ul>
	</div>

<?php endforeach ?>