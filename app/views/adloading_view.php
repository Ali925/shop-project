<form action="/AdLoading/upload" method="POST" enctype="multipart/form-data" class="upload-form">
	<label for="file">Выберите XML-файл: </label>
	<input  type="file" name="file" value="Добавить XML-файл" accept=".xml">
	<input type="submit">
</form>
<?php if($msg):?>
	<h3>Товары успешно добавлены.</h3>
<?php endif; ?>