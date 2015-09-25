<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <div><?= $title ?></div>
        <!--        <div>нас выбирают клиенты</div>-->
    </div>
    <div class="features_list_wrap">
                <h3><?= $product['title'] ?></h3>

        <?php
            echo
                "
                    <a class='btnBack' href='".$_SERVER['HTTP_REFERER']."' >
                        <button>Назад</button>
                    </a>
                    <div class='product_wrap'>
                        <div class='product_img'>
                            <img src='".$product['link']."'/>
                        </div>
                        <div class='product_info' >
                            <p>Производитель: ".$product['mark']."</p>
                            <p>".$product['title']."</p>
                            <p>".$product['description']."</p>
                            <p class='product_price'><br/>Цена: ".$product['price']." р.
                            <br/>Осталось: ".$product['count']." шт.</p>
                            <div class='product_button'>
                                <a class='product_more' href='/Products/item/".$product['id']."'>
                                    <button>Подробнее</button>
                                </a>
                                <a class='product_buy' href='/Products/toBag/".$product['id']."'>
                                    <button>В корзину</button>
                                </a>
                            </div>
                        </div>
                    </div>
                ";

        ?>
    </div>
</div>