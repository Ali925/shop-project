<?php

include_once "app/models/model_user.php";

class Controller_AdUsers extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_User;
    }

    public function action_index(){
        $this->view->generate("adusers_view.php", "adtemp_view.php",
            array(
                'title' => 'Пользователи',
                'addForm' => false,
                'editForm' => false,
                'data' => $this->model->get_users()
            )
        );
    }

    public function action_viewFormAdd(){
        $this->view->generate("adusers_view.php", "adtemp_view.php",
            array(
                'title' => 'Пользователи',
                'addForm' => true,
                'editForm' => false,
                'data' => $this->model->get_users()
            )
        );
    }
    public function action_viewFormEdit($id){
        $this->view->generate("adusers_view.php", "adtemp_view.php",
            array(
                'title' => 'Пользователи',
                'addForm' => false,
                'editForm' => true,
                'data' => null,
                'user' => $this->model->get_user($id)
            )
        );
    }

    public function action_addUser($array){
        $this->model->reg_user($array);

        header("location: /AdUsers");
    }

    public function action_delUser($id){
        $this->model->delete_user($id);

        header("location: /AdUsers");
    }

    public function action_actUser($id){
        $this->model->activate_user($id);

        header("location: /AdUsers");
    }

    public function action_editUser($array){
        $this->model->update_user($array);

        header("location: /AdUsers");
    }
}
?>