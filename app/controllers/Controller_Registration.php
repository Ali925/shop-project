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
        $this->model->reg_user($array);

        header("location: /Authorization");

   }
}