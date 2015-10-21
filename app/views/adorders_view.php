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
                                    <input disabled="disabled" type="text" value="{$order['id']}"><br/>
                                    <input name="id" type="hidden" value="{$order['id']}">
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
                foreach ($property as $value) {                  
                    $id = $value['id_order'];
                    $i = 0;
                    foreach ($data as $item){
                        if($id == $item['id'])
                          {$id_order = $i;
                           break;}
                           $i++;        
                    }
                    $date = date_format(new DateTime($data[$id_order]['date_order']), "Y-m-d");
                    $amount = $value['price']*$value['count'];
                    echo <<<HERE
                <tr>
                    <td>{$value['id_order']}</td>
                    <td>{$date}</td>
                    <td>{$data["{$id_order}"]['status']}</td>
                    <td><a href="/AdOrders/user/{$data["{$id_order}"]['id_user']}">{$data["{$id_order}"]['id_user']}</a></td>
                    <td><a href="/AdOrders/product/{$value['id_product']}">{$value['id_product']}</a></td>
                    <td>{$value['price']}</td>
                    <td>{$value['count']}</td>
                    <td>{$amount}</td>
                    <td><a href="/AdOrders/viewFormEdit/{$data["{$id_order}"]['id']}"><button>Изменить статус</button></a></td>
                </tr>
HERE;
                }
                echo "</table>";
            }
        ?>

</div>