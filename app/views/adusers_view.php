<div class="features_descript" style="border: none">

    <?php
        echo "<h4>{$header}</h4>";
        if($addForm){
            echo <<<HERE
            <div class='Form'>
                <form action='/AdUsers/addUser' method='post'>
                    <div class='dataForm'>
                        <div class='FormHeaders'>
                            <span>Имя: </span><br/>
                            <span>Фамилия: </span><br/>
                            <span>Дата рождения: </span><br/>
                            <span>Email: </span><br/>
                            <span>Пароль: </span><br/>
                            <span>Повторите пароль: </span><br/>
                        </div>
                        <div class='FormData'>
                            <input id="name" name="name" type="text"><br/>
                            <input id="lastname" name="lastname" type="text"><br/>
                            <input id="birthday" name="birthday" type="date"><br/>
                            <input id="email" name="email" type="email"><br/>
                            <input id="pass1" name="pass1" type="password"><br/>
                            <input id="pass2" name="pass2" type="password"><br/>
                            <button type='submit'>Добавить</button>
                        </div>
                    </div>
                 </form>
            </div>
HERE;
        }

        if($editForm){
            echo <<<HERE
                <div class='Form'>
                <form action='/AdUsers/editUser' method='post'>
                    <div class='dataForm'>
                        <div class='FormHeaders'>
                            <span>ID: </span><br/>
                            <span>Имя: </span><br/>
                            <span>Фамилия: </span><br/>
                            <span>Дата рождения: </span><br/>
                            <span>Email: </span><br/>
                        </div>
                        <div class='FormData'>
                            <input disabled="disabled" value="{$user['id']}"><br/>
                            <input name="id" type="hidden" value="{$user['id']}">
                            <input id="name" name="name" type="text" value="{$user['name']}"><br/>
                            <input id="lastname" name="lastname" type="text" value="{$user['lastname']}"><br/>
                            <input id="birthday" name="birthday" type="date" value="{$user['birthday']}"><br/>
                            <input id="email" name="email" type="email" value="{$user['email']}"><br/>
                            <button type='submit'>Изменить</button>
                        </div>
                    </div>
                 </form>
            </div>
HERE;
        }
        if(!$data){
            if(!$editForm && !addForm) {
                echo "<h3>В таблице нет записей о пользователях<h3>";
            }
        }else {
            echo <<<HERE
                <a href='/AdUsers/viewFormAdd'><button>Добавить пользователя</button></a>
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
                    echo "<td><a href='/AdUsers/actUser/{$value['id']}'><button>Активировать email</button></a></td></tr>";
                } else {
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }
    ?>

</div>