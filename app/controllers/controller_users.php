<?php

include_once "app/models/model_user.php";

class Controller_Users extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_User;

        if($_SESSION['type'] !== "user" && $_SESSION["type"] !== "admin") {
            header("location: /");
        }
    }

    function action_index(){
        $this->view->generate("users_view.php", "template_view.php",
            array(
                'title' => 'Личный кабинет',
                'user' => $this->model->get_user($_SESSION["id"])
            )
        );
    }
}