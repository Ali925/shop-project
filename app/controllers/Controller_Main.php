<?php
//Контроллер для главной страницы пользователя
class Controller_Main extends Controller{
    function action_index(){
        $this->view->generate('View_Main.php', 'View_Template.php', array(
            'title' => 'Главная'
        ));
    }
}