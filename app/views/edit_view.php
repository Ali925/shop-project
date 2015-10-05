<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">

    </div>
    <div class="features_list_wrap">

        <div class="change_user_data">
            <h3><?= $title ?></h3>
            <form action="/Edit/editUser" method="post">
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

            </div>
                <input id="id" name="id" style="visibility: hidden" type="text" value="<?php echo $user['id'];?>"><br/>
                <button type="submit">Изменить данные</button>
            </form>

        </div>
    </div>
</div>



    </div>
</div>