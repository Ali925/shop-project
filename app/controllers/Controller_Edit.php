<?php

include_once "app/models/model_user.php";

class Controller_Edit extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_User;
    }

    function action_index(){

        $this->view->generate('edit_view.php', 'template_view.php',
            array(
                'title' => 'Изменение личных данных',
                'user' => $this->model->get_user($_SESSION["id"])
            )
        );
    }
//Получаем новые значения пользовательских данных
   function action_editUser($array){
    
        $this->model->update_user($array);

        header("location: /Users");
    }
}
?>