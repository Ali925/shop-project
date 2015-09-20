<section class="h1"><?php echo $title; ?></section>
<div class="products_img">
    <img src="/images/content/prod_1.png" alt="" style="float: left; margin-right: 10px;">
    <p><?php echo $product['description']; ?></p>
    <ul style="clear: both; margin-top: 20px;">
        <li><b>Цена</b>: - $<?php echo number_format($product['price'], 2, ',', ' '); ?></li>
        <li><b>Марка</b>: - <?php echo $product['mark']; ?></li>
        <li><b>Категория</b>: <?php echo $product['category_name']; ?></li>
    </ul>
    <a href="/products/order/<?php echo $product['id']; ?>" class="buy-link"><button class="buy-btn">Купить</button></a>
</div>