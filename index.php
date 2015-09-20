<?php

# Включаем показ ошибок
ini_set('display_errors', 1);

# Подключаем bootstrap файл

require_once "php-library/autoload.php";
require_once "app/core/route.php";
require_once "app/core/controller.php";
require_once "app/core/view.php";
require_once "app/core/model.php";

Route::start();

