<?php if($form): ?>
<form action="/AdMail/send" method="POST" class="admail-form">
	<div><label for="name">Кому: </label>
	<select name="name" id="name">
		<option value="1">Админам</option>
		<option value="2">Покупателям</option>
		<option value="3">Всем пользователям</option>
		<option value="4">Новым пользователям</option>
		<option value="5">Неактивированным пользователям</option>
	</select></div>
	<div><label for="topic">Тема: </label>
	<input type="text" name="topic"></div>
	<div><label for="text">Сообщение: </label>
	<textarea name="text" id="text" cols="30" rows="10"></textarea></div>
	<input type="submit">
</form>
<?php elseif($sent): ?>
<h3>Ваше письмо успешно отправлено.</h3>
<?php endif; ?>