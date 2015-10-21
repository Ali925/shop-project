<?php

class Controller_User extends Controller {

    public function __construct(){
        parent::__construct();
        $this->model = new Model_User();
    }   

    public function action_index() {

        $this->view->generate("registration_view.php", "template_view.php",
            array(
                "title" => "Регистрация нового пользователя",
                "formReg" => true,
                "success" => false
            )
        );

    }

    public function action_registration($array){

        $this->model->reg_user($array);

        $this->model->email_activate($array);

        header("location: /user/successreg");
   }

    public function action_auth(){      

        if(isset($_POST['email'])){

        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $email = htmlentities($_POST["email"]);
        $password = md5($salt1.$_POST["pass"].$salt2);
        $data = $this->model->get_auth_data($email);
        $true_login = $data["email"];
        $true_password = $data["password"];
        if(!$true_login){
            $message = "Пользователь с данным логином не зарегистрирован";
            header("location: /Error/error/{$message}");
        }elseif($password !== $true_password){
            $message = "Вы ввели неверный пароль";
            header("location: /Error/error/{$message}");
        }else{
            $_SESSION["authorized"] = true;
            $_SESSION["name"] = $data["name"];
            $_SESSION["login"] = $data["email"];
            $_SESSION["id"] = $data["id"];
            $_SESSION["type"] = "user";
            $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
            $row = \ORM::for_table('users')->where("email", $email)->find_one();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['item_count'] = $this->model->get_count($_SESSION['user_id']);
            header("location: /");
        }
    }

        $this->view->generate("authorization_view.php", "template_view.php",
            array(
                "title" => "Авторизация пользователя",
                "formAuth" => true,
                "formNewPass" => false,
                "success" => false
            )
        );
    }

    public function action_out(){
        unset($_SESSION["name"]);
        unset($_SESSION["authorized"]);
        unset($_SESSION["login"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["item_count"]);
        unset($_SESSION["id"]);
        unset($_SESSION["type"]);

        session_destroy();
        header("location: /");
    }

     public function action_fogetPass(){
        $this->view->generate("authorization_view.php", "template_view.php",
            array(
                "title" => "Восстановление пароля",
                "formAuth" => false,
                "formNewPass" => true,
                "success" => false
            )
        );
    }
    public function action_createNewPassword($array){
        $this->model->create_new_pass($array);
        header("location: /user/successauth");
    }

    public function action_successauth(){
        $this->view->generate("authorization_view.php", "template_view.php",
            array(
                "formAuth" => false,
                "formNewPass" => false,
                "success" => true
            )
        );
    }

    public function action_successreg(){
        $this->view->generate("registration_view.php", "template_view.php",
            array(
                "formReg" => false,
                "success" => true
            )
        );
    }

    public function action_activateEmail($hash){
            $hash=$hash[0];
        if($_SESSION['type'] == "user"){
            $user = $this->model->get_user($_SESSION['id']);
            if((int)$user['is_active'] == 0){
                $email = $user['email'] ;
                $date = $user['reg_date'];
                $security = md5($email.$date);
                if($security == $hash){
                    $this->model->activate_User($_SESSION['id']);
                    $message = "Почтовый адрес успешно подтверждён!";
                    header("location: /Error/info/{$message}");
                }else{
                    $message = "Почтовый адрес не подтверждён, обратитесь в техподдержку!";
                    header("location: /Error/error/{$message}");
                }
            }else{
                header('location: /');
            }
        }elseif($_SESSION['type'] != "admin" && $_SESSION['type'] != "user"){
            $message = "Для подтверждения почтового ящика, Вам необходимо <a href='/user/auth'>авторизоваться</a>";
            header("location: /Error/error/{$message}");
        }
    }

}    


?>