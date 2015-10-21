<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="authorize">
            <h3><?= $title ?></h3>

            <?php
            if($formnewPass){
                echo <<<HERE
                        <form action="/users/changepass" method="post">
                            <span>Введите старый пароль</span><br/><input id="pass0" name="pass0" type="password"><br/>
                            <span>Введите новый пароль</span><br/><input id="pass1" name="pass1" type="password"><br/>
                            <span>Повторите новый пароль</span><br/><input id="pass2" name="pass2" type="password"><br/>
                            <button type="submit">Изменить</button><br/>
                        </form>
HERE;
            }elseif($success) {
                echo <<<HERE
                        Пароль успешно изменен
HERE;
            }elseif($notmatch) {
                echo <<<HERE
                        <p>Пароли не совпадают</p><br/>
                        <form action="/users/changepass" method="post">
                            <span>Введите старый пароль</span><br/><input id="pass0" name="pass0" type="password"><br/>
                            <span>Введите новый пароль</span><br/><input id="pass1" name="pass1" type="password"><br/>
                            <span>Повторите новый пароль</span><br/><input id="pass2" name="pass2" type="password"><br/>
                            <button type="submit">Изменить</button><br/>
                        </form>
HERE;
            }
            elseif($unsuccess) {
                echo <<<HERE
                        <p>Вы ввели неверный пароль!</p><br/>
                        <form action="/users/changepass" method="post">
                            <span>Введите старый пароль</span><br/><input id="pass0" name="pass0" type="password"><br/>
                            <span>Введите новый пароль</span><br/><input id="pass1" name="pass1" type="password"><br/>
                            <span>Повторите новый пароль</span><br/><input id="pass2" name="pass2" type="password"><br/>
                            <button type="submit">Изменить</button><br/>
                        </form>
HERE;
            }
            ?>

        </div>
    </div>
</div>

