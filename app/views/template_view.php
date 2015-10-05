<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $title; ?> | e-commerce</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="viewport" content="width=1000">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css" media="screen, projection, print">
    <link rel="stylesheet" type="text/css" href="/css/jquery.bxslider.css" media="screen, projection, print">
    <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div class = "wrapper">
    <div class = "maincontent">
        <div class="container">

        <?php if(!isset($_SESSION["authorized"])): ?>
                <div class="auth">
                    <a href="/user/auth">Войти</a> /
                    <a href="/user">Зарегистрироваться</a>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION["authorized"])): ?>

                <form method="post" action="/user/out">
                <div class="login"><span class="login__text">Здравствуйте, <a href='/users'><?php echo $_SESSION["name"]; ?></a></span>
                <a href="/cabin" class="login__cart"><img src="/img/icons/cart-header.png" alt="cart" width="24" height="24">Корзина <span class="cart-count" id="cart_count"><?php echo $_SESSION['item_count'];?></span></a>
                    <button>Выйти</button></div>
                </form>
            <?php endif; ?>

            <?php require_once '_chunks/header.php'; ?>

            <?php if($is_slider): ?>
                <?php require_once '_chunks/slider.php'; ?>
            <?php endif; ?>

            <?php require_once '_chunks/menu.php'; ?>

            <?php if($is_photo_slider): ?>
                <?php require_once '_chunks/slider-photo.php'; ?>
            <?php endif; ?>

            <div class="content_area main_page">
                <div class="content_area_right">
                    <?php if($is_left_navbar): ?>
                            <?php require_once '_chunks/left_navbar.php'; ?>
                        <?php endif; ?>
                </div>


                <div class="content_area_left">
                    <div class="features">

                        <?php include 'app/views/'.$content_view; ?>

                        <?php if($is_right_sidebar): ?>
                            <?php require_once '_chunks/right_sidebar.php'; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <?php if($is_carousel): ?>
            <section class="carousel">
                <div class="carousel_wrap">
                    <ul>
                        <li>
                            <a href="http://www.apple.com/ru/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo1.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.sony.ru/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo2.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.samsung.com/ru/home/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo3.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.dell.ru/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo4.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.lg.com/ru" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo5.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www8.hp.com/ru/ru/home.html" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo6.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.nokia.com/ru_int" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo7.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.lenovo.com/ru/ru/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo8.png" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.asus.com/ru/" class="carousel_img_wrap" target="_blank">
                                <img src="/img/content/logo9.png" alt=""/>  
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="carousel_controls">
                    <a href="#" class="carousel_control_left"></a>
                    <a href="#" class="carousel_control_right"></a>
                </div>
            </section>
            <?php endif; ?>
        </div> <!-- container -->
    </div> <!-- maincontent -->
    <div class = "empty"></div>
</div> <!-- wrapper -->

<!-- FOOTER HERE -->

<div class = "container">
    <footer role = "contentinfo">
        <div class="footer_main_logo">
            <p>
                <span>
                    <a class="admin" href="/Admin">&copy;</a> 2015 ООО «Лофтскулл». Все права защищены
                </span>
            </p>
        </div>
    </footer>
</div>
<?php require_once '_chunks/footer.php'; ?>