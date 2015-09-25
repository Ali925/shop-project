<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php
        if(!$data){
            echo "<h3>Такого пользователя нет[<h3>";
        }else {
            echo <<<HERE
            <table class='tableContent'>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Дата Рождения</th>
                    <th>Email</th>
                    <th>Статус</th>
                    <th>Дата регистрации</th>
                    <th>Дата последнего изменения</th>
                </tr>
HERE;
                $reg_date = date_format(new DateTime($data['reg_date']), "Y-m-d");
                $last_update = date_format(new DateTime($data['last_update']), "Y-m-d");
                echo <<<HERE
            <tr>
                <td>{$data['id']}</td>
                <td>{$data['name']}</td>
                <td>{$data['lastname']}</td>
                <td>{$data['birthday']}</td>
                <td>{$data['email']}</td>
                <td>{$data['is_active']}</td>
                <td>{$reg_date}</td>
                <td>{$last_update}</td>
                </tr>
HERE;
            echo "</table>";
        }
        ?>
    </div>
</div>