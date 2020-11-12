<form action="/site/index.php/news/edit/<?= $slug_news ?>" method="POST">
	<input type="text" name="slug" placeholder="slug" value="<?= $slug_news ?>"> <br>
	<input type="text" name="title" placeholder="Название новости" value="<?= $title_news ?>"> <br>
	<textarea name="text" placeholder="текст новости"><?= trim($content_news) ?></textarea><br>
	<input type="hidden" value="<?= $id_news ?>" name="id">
	<input type="submit" value="Отправить" name="submit">
</form>
