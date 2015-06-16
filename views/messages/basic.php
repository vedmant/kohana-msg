<?php foreach($messages as $type => $message): ?>
	<ul id="message" class="<?php echo $type; ?>">
		<?php foreach ($message as $text): ?>
			<li><?php echo $msg; ?></li>
		<?php endforeach ?>
	</ul>
<?php endforeach ?>
