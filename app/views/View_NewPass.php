<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="authorize">
            <h3><?= $title ?></h3>

            <?php
            if($formnewPass){
                echo <<<HERE
                        <form action="/NewPass/changePass" method="post">
                            <span>Введите пароль/Email</span><br/><input id="pass1" name="pass1" type="password"><br/>
                            <span>Повторите пароль</span><br/><input id="pass2" name="pass2" type="password"><br/>
                            <button type="submit">Изменить</button><br/>
                        </form>
HERE;
            }elseif($success) {
                echo <<<HERE
                        Пароль успешно изменен
HERE;
            }
            ?>

        </div>
    </div>
</div>