<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <div><?= $title ?></div>
        <!--        <div>нас выбирают клиенты</div>-->
    </div>
    <div class="features_list_wrap">
        <h3><?= $title ?></h3>
        <?php
            foreach($products as $product){
                echo $product['title'];
            }
        ?>
    </div>
</div>