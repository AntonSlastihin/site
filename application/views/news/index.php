<style>
	.content{
		border: 1px solid #999;
		background-color: #eee;

	}
	.content + .content {
		margin-top: 1em;

	}
	.content > a{
		font-family: "Helvetica", sans-serif;
		text-decoration: none;
		display: block;

	}
	.content > a:first-child{
		padding: 1em;
		color: #1d1d1d;
		font-size: 1.25em;
	}
	.edit{
		font-size: 14px;
		color: green;
		padding: 0.5em 1em;
	}
	.red{
		color: red;
	}
</style>

<?php foreach ($news as $key => $value): ?>
	<div class="content">
		<a href="view/<?= $value['id'] ?>"><?= $value['title'] ?></a>
		<a href="edit/<?= $value['id'] ?>" class="edit">Редактировать</a>
		<a href="delete/<?= $value['id'] ?>" class="edit red">Удалить</a>
	</div>
<?php endforeach ?>