<?php

class Controller_NewPass extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function action_index(){
        $this->view->generate("View_NewPass.php", "View_Template.php",
            array(
                "title" => "Изменение пароля",
                "formNewPass" => true,
                "success" => false
            ));
    }

    public function action_success(){
        $this->view->generate("View_NewPass.php", "View_Template.php",
            array(
                "formNewPass" => false,
                "success" => true
            ));
    }
} 