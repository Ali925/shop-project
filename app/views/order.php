<section class="h1"><?php echo $title; $_SESSION['post_array']=$_POST;?></section>
<form method="POST" action="/cabin/payment/<?php echo $_SESSION['user_id'];?>" class="order-form">
		<h3 class="form__header">Адрес доставки</h3>
		<ul class="address-list">
			<li class="address-item">	
				<label for="state" class="order-label">Страна: </label>
				<select name="state" id="state" class="order-input order-select">
						<option value="AF">Afghanistan</option>
						<option value="AX">Åland Islands</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AS">American Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarctica</option>
						<option value="AG">Antigua and Barbuda</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
						<option value="BB">Barbados</option>
						<option value="BY">Belarus</option>
						<option value="BE">Belgium</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivia</option>
						<option value="BQ">Bonaire</option>
						<option value="BA">Bosnia and Herzegovina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvet Island</option>
						<option value="BR">Brazil</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgaria</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="KH">Cambodia</option>
						<option value="CM">Cameroon</option>
						<option value="CA">Canada</option>
						<option value="CV">Cape Verde</option>
						<option value="KY">Cayman Islands</option>
						<option value="CF">Central African Republic</option>
						<option value="TD">Chad</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CX">Christmas Island</option>
						<option value="CC">Cocos Islands</option>
						<option value="CO">Colombia</option>
						<option value="KM">Comoros</option>
						<option value="CG">Congo</option>
						<option value="CD">Congo</option>
						<option value="CK">Cook Islands</option>
						<option value="CR">Costa Rica</option>
						<option value="CI">Côte d'Ivoire</option>
						<option value="HR">Croatia</option>
						<option value="CU">Cuba</option>
						<option value="CW">Curaçao</option>
						<option value="CY">Cyprus</option>
						<option value="CZ">Czech Republic</option>
						<option value="DK">Denmark</option>
						<option value="DJ">Djibouti</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominican Republic</option>
						<option value="EC">Ecuador</option>
						<option value="EG">Egypt</option>
						<option value="SV">El Salvador</option>
						<option value="GQ">Equatorial Guinea</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estonia</option>
						<option value="ET">Ethiopia</option>
						<option value="FK">Falkland Islands (Malvinas)</option>
						<option value="FO">Faroe Islands</option>
						<option value="FJ">Fiji</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="GF">French Guiana</option>
						<option value="PF">French Polynesia</option>
						<option value="TF">French Southern Territories</option>
						<option value="GA">Gabon</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgia</option>
						<option value="DE">Germany</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GR">Greece</option>
						<option value="GL">Greenland</option>
						<option value="GD">Grenada</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GG">Guernsey</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IS">Iceland</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IR">Iran</option>
						<option value="IQ">Iraq</option>
						<option value="IE">Ireland</option>
						<option value="IM">Isle of Man</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JM">Jamaica</option>
						<option value="JP">Japan</option>
						<option value="JE">Jersey</option>
						<option value="JO">Jordan</option>
						<option value="KZ">Kazakhstan</option>
						<option value="KE">Kenya</option>
						<option value="KI">Kiribati</option>
						<option value="KP">North Korea</option>
						<option value="KR">South Korea</option>
						<option value="KW">Kuwait</option>
						<option value="KG">Kyrgyzstan</option>
						<option value="LV">Latvia</option>
						<option value="LB">Lebanon</option>
						<option value="LS">Lesotho</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libya</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Lithuania</option>
						<option value="LU">Luxembourg</option>
						<option value="MO">Macao</option>
						<option value="MK">Macedonia</option>
						<option value="MG">Madagascar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Maldives</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MH">Marshall Islands</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritania</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MX">Mexico</option>
						<option value="FM">Micronesia</option>
						<option value="MD">Moldova</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolia</option>
						<option value="ME">Montenegro</option>
						<option value="MS">Montserrat</option>
						<option value="MA">Morocco</option>
						<option value="MZ">Mozambique</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NL">Netherlands</option>
						<option value="NC">New Caledonia</option>
						<option value="NZ">New Zealand</option>
						<option value="NI">Nicaragua</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="NF">Norfolk Island</option>
						<option value="MP">Northern Mariana Islands</option>
						<option value="NO">Norway</option>
						<option value="OM">Oman</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PS">Palestinian Territory</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua New Guinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippines</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Réunion</option>
						<option value="RO">Romania</option>
						<option value="RU">Russian Federation</option>
						<option value="RW">Rwanda</option>
						<option value="BL">Saint Barthélemy</option>
						<option value="KN">Saint Kitts and Nevis</option>
						<option value="LC">Saint Lucia</option>
						<option value="MF">Saint Martin (French part)</option>
						<option value="PM">Saint Pierre and Miquelon</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome and Principe</option>
						<option value="SA">Saudi Arabia</option>
						<option value="SN">Senegal</option>
						<option value="RS">Serbia</option>
						<option value="SC">Seychelles</option>
						<option value="SL">Sierra Leone</option>
						<option value="SG">Singapore</option>
						<option value="SX">Sint Maarten</option>
						<option value="SK">Slovakia</option>
						<option value="SI">Slovenia</option>
						<option value="SB">Solomon Islands</option>
						<option value="SO">Somalia</option>
						<option value="ZA">South Africa</option>
						<option value="GS">South Georgia</option>
						<option value="SS">South Sudan</option>
						<option value="ES">Spain</option>
						<option value="LK">Sri Lanka</option>
						<option value="SD">Sudan</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard and Jan Mayen</option>
						<option value="SZ">Swaziland</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="SY">Syrian Arab Republic</option>
						<option value="TW">Taiwan, Province of China</option>
						<option value="TJ">Tajikistan</option>
						<option value="TZ">Tanzania</option>
						<option value="TH">Thailand</option>
						<option value="TL">Timor-Leste</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad and Tobago</option>
						<option value="TN">Tunisia</option>
						<option value="TR">Turkey</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks and Caicos Islands</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="AE">United Arab Emirates</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Uzbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VE">Venezuela</option>
						<option value="VN">Viet Nam</option>
						<option value="VG">Virgin Islands, British</option>
						<option value="VI">Virgin Islands, U.S.</option>
						<option value="WF">Wallis and Futuna</option>
						<option value="EH">Western Sahara</option>
						<option value="YE">Yemen</option>
						<option value="ZM">Zambia</option>
						<option value="ZW">Zimbabwe</option>
					</select>
			</li>
			<li class="address-item">
				<label for="address" class="order-label">Адрес: </label>
				<input type="text" name="address" id="address" class="order-input" required>
			</li>
			<li class="address-item">
				<label for="city" class="order-label">Город: </label>
				<input type="text" name="city" id="city" class="order-input" required>
			</li>
			<li class="address-item">
				<label for="zipcode" class="order-label">Почтовый индекс: </label>
				<input type="text" name="zipcode" id="zipcode" class="order-input" required>
			</li>
			<li class="address-item">
				<label for="phone" class="order-label">Телефон: </label>
				<input type="tel" name="phone" id="phone" class="order-input" required>
			</li>
		</ul>
	<h3 class="form__header">Способ оплаты</h3>
	<div class="bank_card">
		<label for="bank_card" class="payment-label">Карта оплаты</label>
		<input type="radio" class="payment-input" name="payment" id="bank_card" value="bank_kard" required>  Банковской картой онлайн (Visa, MasterCard)
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
		<b>Сумма к оплате:</b> $<?php echo $_POST["payment"];?>
	</div>
	<input type="submit" class="submit-btn payment-btn" value="Подтвердить заказ">
</form>