<?php
//Контроллер для страницы регистрации
class Controller_Registration extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\User();
    }

    function action_index(){
        $this->view->generate("View_Registration.php", "View_Template.php",
            array(
                "title" => "Регистрация нового пользователя"
            )
        );
    }

    public function action_registration($array){
        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $name = htmlentities($array["name"]);
        $lastname = htmlentities($array["lastname"]);
        $birthday = $array["birthday"];
        $email = htmlentities($array["mail"]);
        $password1 = htmlentities($array["pass1"]);
        $password2 = htmlentities($array["pass2"]);
        $is_active = 0;

        $reg_date = (string)date_format(new DateTime(), 'Y-m-d');
        $last_update = (string)date_format(new DateTime(), 'Y-m-d');
        if($password1 !== $password2){
            echo <<<HERE
            <div class='alarm'>
                <h3>Пароли не совпадают</h3>
                <a href='/Registration'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        }else{
            $password = md5($salt1.$password1.$salt2);
            $this->model->reg_user($name, $lastname, $birthday, $email, $password, $is_active, $reg_date, $last_update);
            header("location: /Authorization");
        }
   }
}