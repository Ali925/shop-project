<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php
        if(!$data){
            echo "<h3>В таблице нет записей о заказах[<h3>";
        }else {

            echo <<<HERE
            <table class='tableContent'>
                <tr>
                    <th>ID</th>
                    <th>Дата заказа</th>
                    <th>Статус</th>
                    <th>Покупатель</th>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
HERE;
            foreach ($data as $value) {
                $date = date_format(new DateTime($value['date_order']), "Y-m-d");
                $amount = $property[$value['id']]['price']*$property[$value['id']]['count'];
                echo <<<HERE
            <tr>
                <td>{$value['id']}</td>
                <td>{$date}</td>
                <td>{$value['status']}</td>
                <td><a href="/AdUserInfo/user/{$value['id_user']}">{$value['id_user']}</a></td>
                <td><a href="/AdProductInfo/item/{$property["{$value['id']}"]['id_product']}">{$property["{$value['id']}"]['id_product']}</a></td>
                <td>{$property["{$value['id']}"]['price']}</td>
                <td>{$property["{$value['id']}"]['count']}</td>
                <td>{$amount}</td>
                <td><a href="#"><button>Изменить</button></a></td>
                <td><a href="#"><button>Удалить</button></a></td>
            </tr>
HERE;
            }
            echo "</table>";
        }
        ?>
    </div>
</div>