<?php
//Контроллер для страницы авторизации
class Controller_Authorization extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Users();
    }
    function action_index(){
        $this->view->generate("View_Authorization.php", "View_Template.php",
            array(
                "title" => "Авторизация пользователя"
            )
        );
    }

    public function action_authorization($array){
        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $email = htmlentities($array["email"]);
        $password = md5($salt1.$array["pass"].$salt2);
        $data = $this->model->get_auth_user($email);
        $true_login = $data["email"];
        $true_password = $data["password"];
        if(!$true_login){
            echo <<<HERE
            <div class='alarm'>
                <h3>Пользователь с данным логином не зарегистрирован</h3>
                <a href='/Authorization'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        }elseif($password !== $true_password){
            echo <<<HERE
            <div class='alarm'>
                <h3>Вы ввели неверный пароль</h3>
                <a href='/Authorization'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        }else{
            $_SESSION["name"] = $data["name"];
            $_SESSION["id"] = $data["id"];
            $_SESSION["type"] = "user";

            header("location: /");
        }
    }

    public function action_out(){
        unset($_SESSION["name"]);
        unset($_SESSION["id"]);
        unset($_SESSION["type"]);

        session_destroy();
        header("location: /");
    }
}