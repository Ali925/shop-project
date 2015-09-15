<?php
//Контроллер для страницы с контактами
class Controller_Contacts extends Controller
{
    function action_index(){
        $this->view->generate("View_Contacts.php", "View_Template.php",
            array(
                "title" => "Связаться с нами"
            )
        );
    }
}