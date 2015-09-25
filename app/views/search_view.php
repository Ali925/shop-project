<section class="h1"><?php echo $title; ?></section>
<form action="/search/result" method="POST">
  <ul class="search_list">
	<li class="key_word">
		<label for="key_word" class="search_label">Ключевое слово: </label>
		<input name="key_word" type="text" class="search_input">
	</li>
	<li class="item_category">
	<label for="category" class="search_label">*Категория: </label>
		<select name="category" id="item_categories" required>
		 <option disabled selected></option>
			 <?php foreach($categories as $category): ?>
			 	<option value="<?php echo $category['id'];?>"><?php echo $category['title'];?></option>
			 <?php endforeach; ?>	
		</select>
	</li>
	<li class="item_mark">
		<label for="mark" class="search_label">Производитель: </label>
		<select name="mark" id="item_marks">
			<option value=" " selected> </option>
		</select>
	</li>
	<li class="item_price">
			<label for="min" class="search_label">Цена: </label>$
			<input name="min" type="text" class="search_input" placeholder="min">
			<input name="max" type="text" class="search_input" placeholder="max">
	</li>
  </ul>	
	<button type="submit">Поиск</button>
</form>