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

    function action_newpass(){
         $this->view->generate("newpass_view.php", "template_view.php",
            array(
                'title' => 'Изменение пароля',
                'formnewPass' => true
            )
        );
    }

    function action_changepass($array){
        $id = $_SESSION['user_id'];
        $user = $this->model->get_user($id);
        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $passwordO = md5($salt1.$array["pass0"].$salt2);
        $passwordN = md5($salt1.$array["pass1"].$salt2);
        if($user['password'] == $passwordO){
            if($array['pass1'] == $array['pass2']){
             $this->model->change_pass($id,$passwordN);
            unset($_SESSION["name"]);
            unset($_SESSION["authorized"]);
            unset($_SESSION["login"]);
            unset($_SESSION["user_id"]);
            unset($_SESSION["item_count"]);
            unset($_SESSION["id"]);
            unset($_SESSION["type"]);
            session_destroy();
             header( "refresh:1;url=/user/auth" );
            $this->view->generate("newpass_view.php", "template_view.php",
            array(
                'title' => 'Изменение пароля',
                'success' => true
            )
        );

            }
            else{
                $this->view->generate("newpass_view.php", "template_view.php",
            array(
                'title' => 'Изменение пароля',
                'notmatch' => true
            )
        );
            }
        }
        else{
            $this->view->generate("newpass_view.php", "template_view.php",
            array(
                'title' => 'Изменение пароля',
                'unsuccess' => true
            )
        );
        }
    }
}