<!--форма добавление картины-->
<?php if (isset($addResult)):?>
	<p><?php echo $addResult; ?></p>
<?php endif; ?>
<form method="post" action="/picture/add" enctype="multipart/form-data">
	<p>
		<label>Название<input type="text" name="title"></label>

	</p>
	<p>
		<label>Описание</label>
		<textarea name="description"></textarea>
	</p>
	<p>
		<label>Год<input type="date" name="yearCreated"></label>
	</p>
	<p>
		<label>Фото<input type="file" name="img" accept="image/*"></label>
	</p>
	<p>
		<input type="submit" value="Добавить">
		<!--reset-->
	</p>
</form>
<?php 
var_dump(phpinfo());

 ?>