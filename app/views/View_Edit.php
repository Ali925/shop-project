<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="registrate">
            <h3><?= $title ?></h3>
            <form action="/Edit/changeData" method="post">
            <div class="user_info_span">
                <span>Имя: <br/></span>
                <span>Фамилия: <br/></span>
                <span>Дата рождения: <br/></span>
                <span>Email: <br/></span>
                <span>Статус: <br/></span>
            </div>
            <div class="user_info">
                <span><?php echo $user['name']; ?><br/></span>
                <span><?php echo $user['lastname']; ?><br/></span>
                <span><?php echo $user['birthday']; ?><br/></span>
                <span><?php echo $user['email']; ?><br/></span>

                <?php if($user['is_active']):?>
                    <?php echo "<span class='is_active'>Активирован<br/></span>";?>
                <?php endif; ?>
                <?php if(!$user['is_active']): ?>
                    <?php echo "<span class='is_not_active'>Неактивирован<br/></span>";?>
                <?php endif; ?>

            </div>
            <div class="new_user_data">
                <input id="name" name="name" type="text"><br/>
                <input id="lastname" name="lastname" type="text"><br/>
                <input id="birthday" name="birthday" type="date" ><br/>
                <input id="email" name="email" type="email"><br/>
                <a href="#">Активировать Email</a>

<!--                <input id="pass1" name="pass1" type="password"><br/>-->
<!--                <input id="pass2" name="pass2" type="password"><br/>-->
            </div>
                <button type="submit">Изменить данные</button>
            </form>

        </div>
    </div>
</div>



    </div>
</div>