<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><? $title ?> | e-commerce</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="viewport" content="width=1000">

    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.bxslider.css" media="screen, projection, print">
    <link rel="stylesheet" type="text/css" href="../../css/main.css" media="screen, projection, print">

    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div class = "wrapper">
    <div class = "maincontent">
        <div class="container">
            <?php if($_SESSION['type'] === 'admin'):?>
                <?php
                echo <<<HERE
                    <div class='features_list_wrap'>
                        <h3>{$title} {$_SESSION['name']}</h3>
                        <a href='/AdAuth/AdOut'><button>Выход</button></a><br/>
                        <a href='/'><button>Главная</button></a>
                        <ul class='admin_list'>
                            <a href='/AdUsers'><li>Пользователи</li></a>
                            <a href='/AdCategories'><li>Категории</li></a>
                            <a href='/AdProducts'><li>Товары</li></a>
                            <a href='/AdOrders'><li>Заказы</li></a>
                        </ul>
                    </div>
HERE;

                ?>
            <?php endif;?>
            <div class="content_view">
                <?php include "app/views/".$content_view; ?>
            </div>
        </div> <!-- container -->
    </div> <!-- maincontent -->
</div> <!-- wrapper -->

<!-- FOOTER HERE -->

<?php require_once '_chunks/footer.php'; ?>