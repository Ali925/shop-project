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
    public function action_auth($array){
        $salt1= "0f1q/";
        $salt2 = "z@9c";
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        $pass = md5($salt1.$array["pass"].$salt2);
        if($name && $pass) {
            $data = $this->model->get_auth_ad($name);
            $true_name = $data["name"];
            $true_password = $data["password"];
            if ($name !== $true_name) {
                header("location: /AdAuth");
            } elseif ($pass !== $true_password) {
                header("location: /AdAuth");
            } else {
                if ($_SESSION["type"] == "user") {
                    unset($_SESSION["name"]);
                    unset($_SESSION["type"]);
                    unset($_SESSION["id"]);
                }

                $_SESSION["name"] = $data["name"];
                $_SESSION["type"] = "admin";
                header("location: /Admin");
            }
        }else{
                $message = "Введены неверные данные";
            header("location: /Error/aderror/{$message}");

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