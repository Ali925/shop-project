<section class="h1"><?php echo $title; $sum = 0; $i=1;?></section>
<?php if(empty($products)): ?>
<h3>В корзине пусто.</h3>
<?php else: ?>
<div class="cart-main">
	<form action="/cabin/order" method="POST" class="cart-main__form">
		<ul class="cart-main__list">
			<?php foreach($products as $product): ?>
				<li class="cart-main__item">
					<div class="about-item">
						<div class="about-item__img"><img src="<?php echo $product['link'];?>" alt="" style="float: left; margin-right: 10px;height: 90px"></div>
						<div class="about-item__text"><div class="about-item__title"><?php echo $product['title']; ?></div>
						<div class="about-item__count"><label for="quantity" class="about-item__label">Кол-во: </label>
						<input type="number" name="quantity_<?php echo $product['id'];?>" class="about-item__input" min="1" max="<?php echo $product['count'];?>" value = "1">
						<span>осталось <?php echo $product['count']; ?> штук</span></div>
						<div class="about-item__price">Цена: $<span class="item_price"><?php echo $product['price']; $sum = $sum + $product['price']; ?></span></div></div>
						<div class="about-item__summary">Сумма: $<span class="summary-text"><?php echo $product['price']; ?></span></div>
						<div class="about-item__button"><a href="/cabin/delete/<?php echo $product['id'];?>" class="about-item__delete">Удалить</a></div>
						<input type="hidden" name="id_<?php echo $i;?>" value="<?php echo $product['id']; ?>">
						<input type="hidden" name="price_<?php echo $i;?>" value="<?php echo $product['price']; ?>"><?php $i++;?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="payment">Сумма к оплате: $<span id="payment"><?php echo $sum; ?></span><input type="hidden" name="payment" id="hidden_payment" value="<?php echo $sum; ?>">
		<input type="hidden" name="item_count" value="<?php echo ($i-1); ?>"></div>
		<input type="submit" id="submit-btn" class="submit-btn" value="Оформить заказ">
	</form>
</div>
<?php endif; ?>