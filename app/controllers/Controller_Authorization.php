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
                "title" => "Авторизация пользователя",
                "formAuth" => true,
                "formNewPass" => false,
                "success" => false
            )
        );
    }

    public function action_authorization($array){
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);

        $userData = $this->model->get_auth_user($email);

        $this->model->authorization_user($array, $userData);
    }

    public function action_out(){
        unset($_SESSION["name"]);
        unset($_SESSION["id"]);
        unset($_SESSION["type"]);

        session_destroy();
        header("location: /");
    }

    public function action_fogetPass(){
        $this->view->generate("View_Authorization.php", "View_Template.php",
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

        header("location: /Authorization/success");
    }

    public function action_success(){
        $this->view->generate("View_Authorization.php", "View_Template.php",
            array(
                "formAuth" => false,
                "formNewPass" => false,
                "success" => true
            )
        );
    }



}