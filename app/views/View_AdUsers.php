<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
    <?php

        echo "<a href='/AdUsers/viewFormAdd'><button>Добавить пользователя</button></a>";

        if($addForm){
            echo <<<HERE
                    <form action='/AdUsers/addUser' method='post'>
                    <table class='tableContent'>
                         <tr>
                             <th>Имя</th>
                             <th>Фамилия</th>
                             <th>Дата Рождения</th>
                             <th>Email</th>
                             <th>Пароль</th>
                             <th>Повторите пароль</th>
                         </tr>
                         <tr>
                                <td><input id="name" name="name" type="text"></td>
                                <td><input id="lastname" name="lastname" type="text"></td>
                                <td><input id="birthday" name="birthday" type="date"></td>
                                <td><input id="email" name="email" type="email"></td>
                                <td><input id="pass1" name="pass1" type="password"></td>
                                <td><input id="pass2" name="pass2" type="password"></td>
                                <td><button type='submit'>Добавить</button></td>
                         </tr>
                    </form>
HERE;
        }

        if($editForm){
            echo <<<HERE
                    <form action='/AdUsers/editUser' method='post'>
                    <table class='tableContent'>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Дата Рождения</th>
                    <th>Email</th>
                </tr>
                <tr>
                       <td><input id="name" name="name" type="text" value="{$user['name']}"></td>
                       <td><input id="lastname" name="lastname" type="text" value="{$user['lastname']}"></td>
                       <td><input id="birthday" name="birthday" type="date" value="{$user['birthday']}"></td>
                       <td><input id="email" name="email" type="email" value="{$user['email']}"></td>
                       <td><button type='submit'>Изменить</button></td>
                </tr>
                <input id="id" name="id" style="visibility: hidden" type="text" value="{$user['id']}">
                    </form>
HERE;
        }
        if(!$data){
            echo "<h3>В таблице нет записей о пользователях<h3>";
        }else {
            echo <<<HERE
                <table class='tableContent'>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Дата Рождения</th>
                        <th>Email</th>
                        <th>Статус email</th>
                        <th>Дата регистрации</th>
                        <th>Дата последнего изменения</th>
                        <th>Статус пользователя</th>
                    </tr>
HERE;

        foreach ($data as $value) {
            $reg_date = date_format(new DateTime($value['reg_date']), "Y-m-d");
            $last_update = date_format(new DateTime($value['last_update']), "Y-m-d");
            echo <<<HERE
                <tr>
                    <td>{$value['id']}</td>
                    <td>{$value['name']}</td>
                    <td>{$value['lastname']}</td>
                    <td>{$value['birthday']}</td>
                    <td>{$value['email']}</td>
HERE;
            if($value['is_active']) {
                echo "<td>Активирован</td>";
            }
            else{
                echo "<td>Н/А</td>";
            }

            echo <<<HERE
                <td>{$reg_date}</td>
                <td>{$last_update}</td>
HERE;
            if($value['is_delete']) {
                echo "<td>Удален</td>";
            }
            else{
                echo "<td>Активен</td>";
            }

            echo <<<HERE
                <td><a href="/AdUsers/viewFormEdit/{$value['id']}"><button>Изменить</button></a></td>
HERE;
            if(!$value['is_delete']) {
                echo "<td><a href='/AdUsers/delUser/{$value['id']}'><button>Удалить</button></a></td>";

                if (!$value['is_active']) {
                    echo "<td><a href='/AdUsers/actUser/{$value['id']}'><button>Активировать</button></a></td></tr>";
                } else {
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }
    ?>
    </div>
</div>
