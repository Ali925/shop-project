<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php
            if($editForm) {
                echo <<<HERE
                <form action='/AdOrders/editOrder' method='post'>
                    <input id="id" name="id" style="visibility:hidden" value="{$order['id']}" type="number"></input>
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
                $date = date_format(new DateTime($order['date_order']), "Y-m-d");
                $amount = $property[$order['id']]['price']*$property[$order['id']]['count'];
                echo <<<HERE
                        <tr>
                            <td>{$order['id']}</td>
                            <td>{$date}</td>
                            <td>
                                <select id="status" name="status">

HERE;
                    switch($order['status']){
                        case "Завершён":
                            echo <<<HERE
                                <option selected='selected'>Завершён</option>
                                <option>Отменён</option>
                                <option>В обработке</option>
HERE;
                            break;
                        case "Отменён":
                            echo <<<HERE
                                <option>Завершён</option>
                                <option selected='selected'>Отменён</option>
                                <option>В обработке</option>
HERE;
                            break;
                        default:
                            echo <<<HERE
                                <option>Завершён</option>
                                <option>Отменён</option>
                                <option selected='selected'>В обработке</option>
HERE;
                            break;
                    }

                echo <<<HERE
                                </select>
                            </td>
                            <td><a href="/AdOrders/user/{$order['id_user']}">{$order['id_user']}</a></td>
                            <td><a href="/AdOrders/product/{$property[$order["id"]]['id_product']}">{$property[$order["id"]]['id_product']}</a></td>
                            <td>{$property[$order["id"]]['price']}</td>
                            <td>{$property[$order["id"]]['count']}</td>
                            <td>{$amount}</td>
                            <td><button type='submit' >Сохранить</button></td>
                        </tr>
                    </table>
                    </form>
HERE;
            }

        if($data){
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
                <td><a href="/AdOrders/user/{$value['id_user']}">{$value['id_user']}</a></td>
                <td><a href="/AdOrders/product/{$property["{$value['id']}"]['id_product']}">{$property["{$value['id']}"]['id_product']}</a></td>
                <td>{$property["{$value['id']}"]['price']}</td>
                <td>{$property["{$value['id']}"]['count']}</td>
                <td>{$amount}</td>
                <td><a href="/AdOrders/viewFormEdit/{$value['id']}"><button>Изменить статус</button></a></td>
            </tr>
HERE;
            }
            echo "</table>";
        }
        ?>
    </div>
</div>