<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="registrate">
            <h3><?= $title?></h3>
            <form action="/user/registration" method="post" class="register-form">
               <div class="user_info_span">
                <span>Имя</span>
                <span>Фамилия</span>
                <span>Дата Рождения</span>
                <span>Email</span>
                <span>Пароль</span>
                <span>Повторите пароль</span>
                </div>
                <div class="user_info">
                    <input id="name" name="name" type="text"><br/>
                    <input id="lastname" name="lastname" type="text"><br/>
                    <input id="birthday" name="birthday" type="date"><br/>
                    <input id="mail" name="mail" type="email"><br/>
                    <input id="pass1" name="pass1" type="password"><br/>
                    <input id="pass2" name="pass2" type="password"><br/>
                </div>
                    <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>