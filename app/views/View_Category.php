<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <div><?= $title ?></div>
        <!--        <div>нас выбирают клиенты</div>-->
    </div>
    <div class="features_list_wrap">
        <!--        <h3>--><?//= $title ?><!--</h3>-->

        <?php
        foreach($products as $product){
            echo
                "
                    <div class='product_wrap'>
                        <div class='product_img'>
                            <img src='".$product['link']."'/>
                        </div>
                        <div class='product_info' >
                            <h4 class='product_header'>".$product['title']."</h4>
                            <p>".$product['description']."</p>
                            <p class='product_price'><br/>Цена: ".$product['price']." р.</p>
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
                    <hr/>
                ";

        }
        ?>
    </div>
</div>