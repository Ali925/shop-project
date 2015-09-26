<?php
class Route
{
    static function start()
    {
        session_start();

        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $params = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if(!empty($routes[3])){
            $params = $routes[3];
        }
        else{
            if(isset($_REQUEST)){
                $params = $_REQUEST;
            }
        }

        // добавляем префиксы
        switch ($controller_name){
            case "Registration":
                $model_name = "Model_Users";
                break;
            case "Authorization":
                $model_name = "Model_Users";
                break;
            case "AdAuth":
                $model_name = "Model_Users";
                break;
            case "AdUsers":
                $model_name = "Model_Users";
                break;
            case "Edit":
                $model_name = "Model_Users";
                break;
            case "AdProducts":
                $model_name = "Model_Products";
                break;
            case "AdCategories":
                $model_name = "Model_Categories";
                break;
            case "AdOrders":
                $model_name = "Model_Orders";
                break;
            default:
                $model_name = 'Model_' . $controller_name;
                break;
        }

        $controller_name = "Controller_" . $controller_name;
        $action_name = "action_" . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = $model_name . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include "app/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name . '.php';
        $controller_path = "app/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "app/controllers/" . $controller_file;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage();
        }

        // если контроллер в файле не определен, то выбрасываем 404
        if(!class_exists($controller_name)){
            Route::ErrorPage();
        } else {
            $controller = new $controller_name;
            $action = $action_name;

            if (method_exists($controller, $action)) {
                // вызываем действие контроллера

                if($params){
                    $controller->$action($params);
                } else {
                    $controller->$action();
                }

            } else {
                // здесь также разумнее было бы кинуть исключение
                Route::ErrorPage();
            }
        }
    }
    function ErrorPage()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'Error');
    }
}