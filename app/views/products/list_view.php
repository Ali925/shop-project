<section class="h1"><?php echo $title; ?></section>
<?php if($is_search): ?>
    <a href="/search/wide" class="wide_search">Расширенный поиск</a>
<?php endif; ?>
<ul class="products">
    <?php if(is_array($products))foreach($products as $product): ?>
        <li>
            <a href="/products/view/<?php echo $product['id'];?>">
                <div class="products_img">
                    <img src="<?php echo $product['link'];?>" alt="">
                </div>
                <div class="products_title">
                    <span><?php echo $product['title']; ?></span>
                </div>
            </a>
            <a href="<?php if(isset($_SESSION['authorized'])) echo '/cabin/add/'.$product['id']; else echo '/user';?>" id="item__<?php echo $product['id']; ?>" class="list_buy-link"><button class="list_buy-btn <?php $key=0; foreach($incart as $cart) {if($cart['id_product']==$product['id']) {echo 'list_buy-active'; $key=1; break;}} if($key==0 && !$product['count']) {echo "list_buy-disable";}?>" <?php if($key==0 && !$product['count']) echo "disabled";?>><?php $key=0; foreach($incart as $cart) {if($cart['id_product']==$product['id']) {echo 'В корзине'; $key=1; break;}} if($key==0 && !$product['count']) {echo "Нет в наличии";} elseif($key==0) {echo "В корзину";}?></button></a>
        </li>
    <?php endforeach; ?>
        <?php if(!is_array($products) || empty($products)) echo "<h3>По вашему запросу ничего не найдено :(</h3>";?>
</ul>

