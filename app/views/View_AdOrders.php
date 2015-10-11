<div class="features_descript" style="border: none">

        <?php
            echo "<h4>{$header}</h4>";
            if($editForm) {
                $amount = $property[$order['id']]['price']*$property[$order['id']]['count'];
                echo <<<HERE
                    <div class='Form'>
                        <form action='/AdOrders/editOrder' method='post'>
                            <div class='dataForm'>
                                <div class='FormHeaders'>
                                    <span>ID: </span><br/>
                                    <span>Дата заказа: </span><br/>
                                    <span>Статус: </span><br/>
                                    <span>Покупатель: </span><br/>
                                    <span>Товар: </span><br/>
                                    <span>Цена: </span><br/>
                                    <span>Количество: </span><br/>
                                    <span>Сумма: </span><br/>
                                </div>
                                <div class='FormData'>
                                    <input id="id" name="id" disabled="disabled" type="text" value="{$order['id']}"><br/>
                                    <input disabled="disabled" type="text" value="{$order['date_order']}"><br/>
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
                                    <a href="/AdOrders/user/{$order['id_user']}"><input style="cursor:pointer" disabled="disabled" placeholder="Нажмите, чтобы посмотреть данные пользователя" type="text" value="{$order['id_user']}"></a><br/>
                                    <a href="/AdOrders/product/{$property[$order['id']]['id_product']}"><input style="cursor:pointer" disabled="disabled" placeholder="Нажмите, чтобы посмотреть данные товара" type="text" value="{$property[$order['id']]['id_product']}"></a><br/>
                                    <input disabled="disabled" type="text" value="{$property[$order["id"]]['price']}"><br/>
                                    <input disabled="disabled" type="text" value="{$property[$order["id"]]['count']}"><br/>
                                    <input disabled="disabled" type="text" value="{$amount}"><br/>
                                    <button type='submit'>Изменить</button>
                            </div>
                        </div>
                     </form>
                </div>
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