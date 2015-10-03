<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="authorize">
            <h3><?= $title ?></h3>

            <?php
                if($formAuth){
                    echo <<<HERE
                        <form action="/Authorization/authorization" method="post">
                            <span>Логин/Email</span><br/><input id="email" name="email" type="email"><br/>
                            <span>Пароль</span><br/><input id="pass" name="pass" type="password"><br/>
                            <button type="submit">Войти</button><br/>
                            <a class="foget_pass" href="/Authorization/fogetPass">Не помню пароль</a>
                        </form>
HERE;
                }elseif($formNewPass){
                    echo <<<HERE
                        <form action="/Authorization/createNewPassword" method="post">
                            <span>Введите вашу фамилию:</span><br/><input id="lastname" name="lastname" type="text"><br/>
                            <span>Введите ваш Email:</span><br/><input id="email" name="email" type="email"><br/>
                            <button type="submit">Получить новый пароль</button><br/>
                        </form>
HERE;
                }elseif($success) {
                    echo <<<HERE
                        Письмо с новым паролем отправлено вам на почту

HERE;
                }
            ?>

        </div>
    </div>
</div>