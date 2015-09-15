<?php
//Контроллер для страницы регистрации
class Controller_Reg extends Controller
{
    function action_index(){
        $this->view->generate('View_Registration.php', 'View_Template.php',
            array(
                'title' => 'Регистрация нового пользователя'
            )
        );
    }
}