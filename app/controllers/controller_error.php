<?php

class Controller_Error extends Controller{

    function action_index(){
        $this->view->generate("error_view.php", "template_view.php",
            array(
                'message' => "Неопознанная ошибка"
            ));
    }

    function action_error($message){
        $this->view->generate("error_view.php", "template_view.php",
            array(
                'message' => $message,
                'error' => true
            ));
    }

    function action_info($message){
        $this->view->generate("error_view.php", "template_view.php",
            array(
                'message' => $message,
                'error' => false
            ));
    }

    function action_aderror($message){
        $this->view->generate("error_view.php", "template_view.php",
            array(
                'message' => $message,
                'error' => true
            ));
    }
}