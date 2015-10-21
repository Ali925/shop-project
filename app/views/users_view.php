<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <div><?= $title ?></div>

    </div>
    <a href="/Edit">Изменить данные</a>
    <a href="/users/newpass" class="newpass-link">Изменить пароль</a>
    <div class="features_list_wrap">

        <div class="user_info_span">
            <span>Имя: <br/></span>
            <span>Фамилия: <br/></span>
            <span>Дата рождения: <br/></span>
            <span>Email: <br/></span>
            <span>Статус: <br/></span>
            <span>Дата регистрации: <br/></span>
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

            <span><?php
                $date = new DateTime($user['reg_date']);
                $date = date_format($date, "Y-m-d");
                echo $date; ?><br/>
            </span>

        </div>

    </div>
</div>