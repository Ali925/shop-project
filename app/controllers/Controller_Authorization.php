<?php
//Контроллер для страницы авторизации
class Controller_Auth extends Controller
{
    function action_index(){
        $this->view->generate("View_Authorization.php", "View_Template.php",
            array(
                "title" => "Авторизация пользователя"
            )
        );
    }
}