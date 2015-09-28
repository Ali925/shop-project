<section class="h1"><?php echo $title; ?></section>
<div class="products_img">
    <img src="<?php echo $product['link'];?>" alt="" style="float: left; margin-right: 10px; height: 200px;">
</div>
    <p><?php echo $product['description']; ?></p>
    <ul style="clear: both; margin-top: 20px;">
        <li><b>Цена</b>: - $<?php echo number_format($product['price'], 2, ',', ' '); ?></li>
        <li><b>Марка</b>: - <?php echo $product['mark']; ?></li>
        <li><b>Категория</b>: <?php echo $product['category']; ?></li>
    </ul>
    <a href="<?php if(isset($_SESSION['authorized'])) echo '/cabin/add/'.$product['id']; else echo '/user';?>" class="buy-link"><button class="buy-btn <?php $key=0; foreach($incart as $cart) {if($cart['id_product']==$product['id']) {echo 'buy-btn_active'; $key=1; break;}} if($key==0 && !$product['count']) {echo "buy-btn_disable";}?>" <?php if($key==0 && !$product['count']) echo "disabled";?>><?php $key=0; foreach($incart as $cart) {if($cart['id_product']==$product['id']) {echo 'В корзине'; $key=1; break;}} if($key==0 && !$product['count']) {echo "Нет в наличии";} elseif($key==0) {echo "В корзину";}?></button></a>
