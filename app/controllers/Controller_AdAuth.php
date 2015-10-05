<?php
include_once "app/models/model_admin.php";
class Controller_AdAuth extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_Admin;
    }
    public function action_index(){
        if($_SESSION['type'] !== "admin"){
            $this->view->generate("adauth_view.php", "adtemp_view.php",
                array(

                )
            );
    }
    }
//Авторизация для админа
    public function action_auth(){
        $salt1= "0f1q/";
        $salt2 = "z@9c";
        $name = htmlentities($_POST["name"]);
        $pass = md5($salt1.$_POST["pass"].$salt2);
        $data = $this->model->get_auth_ad($name);
        $true_name = $data["name"];
        $true_password = $data["password"];
        if($name !== $true_name){
           header("location: /products");
        }elseif($pass !== $true_password){
            header("location: /");
        }else{
            $_SESSION["name"] = $data["name"];
            $_SESSION["type"] = "admin";

            header("location: /Admin");
        }
    }

//Выход из админки
    public function action_AdOut(){
        unset($_SESSION["name"]);
        unset($_SESSION["type"]);

        session_destroy();
        header("location: /");
    }
}

?>