<section class="h1"><?php echo $title; ?></section>
<div class="products_img">
    <img src="/img/content/prod_1.png" alt="" style="float: left; margin-right: 10px;">
    <p><?php echo $product['description']; ?></p>
    <ul style="clear: both; margin-top: 20px;">
        <li><b>Цена</b>: - $<?php echo number_format($product['price'], 2, ',', ' '); ?></li>
        <li><b>Марка</b>: - <?php echo $product['mark']; ?></li>
        <li><b>Категория</b>: <?php echo $product['category']; ?></li>
    </ul>
    <a href="/cabin/add/<?php echo $product['id']; ?>" class="buy-link"><button class="buy-btn <?php if($product['is_added']) {echo 'buy-btn_active';} elseif(!$product['count']) {echo "buy-btn_disable";}?>" <?php if(!$product['count']) echo "disabled";?>><?php if(!$product['count']) {echo "Нет в наличии";} elseif($product['is_added']) {echo 'В корзине';} else {echo "В корзину";}?></button></a>
</div>