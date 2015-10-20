<?php

class Controller_Error extends Controller{

    function action_index(){
        $this->view->generate("View_Error.php", "View_Template.php",
            array(
                'message' => "Неопознанная ошибка"
            ));
    }

    function action_error($message){
        $this->view->generate("View_Error.php", "View_Template.php",
            array(
                'message' => $message,
                'error' => true
            ));
    }

    function action_info($message){
        $this->view->generate("View_Error.php", "View_Template.php",
            array(
                'message' => $message,
                'error' => false
            ));
    }

    function action_aderror($message){
        $this->view->generate("View_Error.php", "View_AdTemp.php",
            array(
                'message' => $message,
                'error' => true
            ));
    }
}
