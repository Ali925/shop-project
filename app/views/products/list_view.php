<section class="h1"><?php echo $title; ?></section>
<?php if($is_search): ?>
    <a href="/search/wide" class="wide_search">Расширенный поиск</a>
<?php endif; ?>
<ul class="products">
    <?php if(is_array($products))foreach($products as $product): ?>
        <li>
            <a href="/products/view/<?php echo $product['id'];?>
            ">
                <div class="products_img">
                    <img src="<?php echo $product['link'];?>" alt="">
                </div>
                <div class="products_title">
                    <span><?php echo $product['title']; ?></span>
                </div>
            </a>
            <a href="/cabin/add/<?php echo $product['id']; ?>" id="item__<?php echo $product['id']; ?>" class="list_buy-link"><button class="list_buy-btn <?php if($product['is_added']) {echo 'list_buy-active';} elseif(!$product['count']) {echo "list_buy-disable";}?>" <?php if(!$product['count']) echo "disabled";?>><?php if(!$product['count']) {echo "Нет в наличии";} elseif($product['is_added']) {echo 'В корзине';} else {echo "В корзину";}?></button></a>
        </li>
    <?php endforeach; ?>
        <?php if(!is_array($products) || empty($products)) echo "<h3>По вашему запросу ничего не найдено :(</h3>";?>
</ul>

