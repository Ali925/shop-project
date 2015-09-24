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
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false
            )
        );

    }

    public function action_registration(){

        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $name = htmlentities($_POST["name"]);
        $lastname = htmlentities($_POST["lastname"]);
        $birthday = $_POST["birthday"];
        $email = htmlentities($_POST["mail"]);
        $password1 = htmlentities($_POST["pass1"]);
        $password2 = htmlentities($_POST["pass2"]);
        $is_active = 0;

        $reg_date = (string)date_format(new DateTime(), 'Y-m-d');
        $last_update = (string)date_format(new DateTime(), 'Y-m-d');
        if($password1 !== $password2){
            echo <<<HERE
            <div class='alarm'>
                <h3>Пароли не совпадают</h3>
                <a href='/user'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        }else{
            $password = md5($salt1.$password1.$salt2);
            $this->model->reg_user($name, $lastname, $birthday, $email, $password, $is_active, $reg_date, $last_update);
            header("location: /user/auth");
        }
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
            echo <<<HERE
            <div class='alarm'>
                <h3>Пользователь с данным логином не зарегистрирован!</h3>
            </div>
HERE;
        }elseif($password !== $true_password){
            echo <<<HERE
            <div class='alarm'>
                <h3>Вы ввели неверный пароль!</h3>
            </div>
HERE;
        }else{
            $_SESSION["authorized"] = true;
            $_SESSION["name"] = $data["name"];
            $_SESSION["login"] = $data["email"];
            $email = $_SESSION['login'];
            $row = \ORM::for_table('users')->where("email", $email)->find_one();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['item_count'] = $this->model->get_count($_SESSION['user_id']);
            header("location: /Main");
        }
    }

        $this->view->generate("authorization_view.php", "template_view.php",
            array(
                "title" => "Авторизация пользователя",
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false
            )
        );
    }

    public function action_out(){
        unset($_SESSION["name"]);
        unset($_SESSION["authorized"]);
        unset($_SESSION["login"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["item_count"]);

        session_destroy();
        header("location: /Main");
    }



}    


?>