<?php foreach ($news as $key => $value): ?>
	<div class="content">
		<h4><?= $value['title'] ?></h4>
		<p><?= $value['text'] ?></p>
	</div>
<?php endforeach ?>