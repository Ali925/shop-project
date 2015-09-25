<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
    <?php
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
                    <th>Статус</th>
                    <th>Дата регистрации</th>
                    <th>Дата последнего изменения</th>
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
                <td>{$value['is_active']}</td>
                <td>{$reg_date}</td>
                <td>{$last_update}</td>
                <td><a href="#"><button>Изменить</button></a></td>
                <td><a href="#"><button>Удалить</button></a></td>
HERE;
            if(!$value['is_active']){
                echo "<td><a href='#'><button>Активировать</button></a></td></tr>";
            }else{
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    ?>
    </div>
</div>
