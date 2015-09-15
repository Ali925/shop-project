<?php
//Контроллер для страницы о магазине
class Controller_About extends Controller{
    function action_index(){
        $this->view->generate("View_About.php", "View_Template.php", array(
            "title" => "О нас"
        ));
    }
}