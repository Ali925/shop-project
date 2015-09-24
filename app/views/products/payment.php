<section class="h1"><?php echo $title; ?></section>
<form action="" method="POST" class="payment-form">
	<div class="bank_card">
		<label for="bank_card" class="payment-label">Карта оплаты</label>
		<input type="radio" class="payment-input" name="payment" id="bank_card" value="bank_kard">  Банковской картой онлайн (Visa, MasterCard)
		<img src="/img/icons/visa.png" alt="visa" width="48" height="48" class="payment-img">
	</div>
	<div class="bank_card-form" hidden>
	<ul>
		<li class="bank_card-item">
			<label for="card_number" class="bank_card-label">Номер карты: </label>
			<input type="text" name="card_number" class="bank_card-input" placeholder=" 1111 2222 3333 4444 ">
		</li>
		<li class="bank_card-item">
			<label for="deadline" class="bank_card-label">Действует до: </label>
			<input type="month" name="deadline" id="deadline" class="bank_card-input">
		</li>
		<li class="bank_card-item">
			<label for="name" class="bank_card-label">Имя и фамилия владельца: </label>
			<input type="text" name="name" class="bank_card-input">
		</li>
		<li class="bank_card-item">
			<label for="cvv" class="bank_card-label">Код CVV: </label>
			<input type="text" name="cvv" id="cvv_code" class="bank_card-input" placeholder=" 123 ">
		</li>
	</ul>
	</div>
	<hr>
	<div class="cash">
		<label for="cash" class="payment-label">Наличные</label>
		<input type="radio" name="payment" value="elecsnet" class="payment-input">  Терминалы Элекснет
		<img src="/img/icons/pay-elecsnet.png" alt="elecsnet" width="40" height="40" class="payment-img">
	</div>
	<div></div>
	<hr>
	<div class="e-money">
		<label for="e-money" class="payment-label">Электронные деньги</label>
		<input type="radio" name="payment" value="paypal" class="payment-input">  PayPal
		<img src="/img/icons/Paypal-icon.png" alt="paypal" width="48" height="48" class="payment-img">
		<input type="radio" name="payment" value="yandex" class="payment-input">  Яндекс.Деньги
		<img src="/img/icons/Yandex-Money.png" alt="yandex" width="48" height="48" class="payment-img">
		<input type="radio" name="payment" value="webmoney" class="payment-input">  WebMoney
		<img src="/img/icons/wmlogo_128.png" alt="webmoney" width="44" height="44" class="payment-img">
	</div>
	<div class="e-money-form" hidden>
	<ul>
		<li class="e-money-item">
			<label for="login" class="e-money-label">Логин: </label>
			<input type="text" name="login" class="e-money-input">
		</li>
		<li class="e-money-item">
			<label for="password" class="e-money-label">Пароль: </label>
			<input type="password" name="password" class="e-money-input">
		</li>
	</ul>	
	</div>
	<hr>
	<div class="transfer">
		<label for="transfer" class="payment-label">Переводы</label>
		<input type="radio" name="payment" value="bank_transfer" class="payment-input"><span class="payment-method">  Банковский перевод</span>
		<input type="radio" name="payment" value="post_transfer" class="payment-input"><span class="payment-method">  Почтовый перевод</span>
	</div>
	<div></div>
	<div class="payment-info">
		<b>Сумма к оплате:</b> $<?php echo $product['price'] * $_POST['quantity'];?>
	</div>
	<input type="submit" class="submit-btn payment-btn" value="Подтвердить заказ">
</form>