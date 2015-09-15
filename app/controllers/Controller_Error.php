<?php
//Контроллер для страницы с сообщением об ошибке
class Controller_Error extends Controller{
    function action_index(){
        $this->view->generate("View_Error.php", "View_Template.php", array(
            "title" => "Что-то пошло не так"
        ));
    }
}