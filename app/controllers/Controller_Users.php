<?php
//Контроллер для работы с каталогом
class Controller_Users extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Users();

        if($_SESSION['type'] !== "user" || $_SESSION["type"] !== "admin") {
            header("location: /");
        }
    }

    function action_index(){
        $this->view->generate('View_Users.php', 'View_Template.php',
            array(
                'title' => 'Личный кабинет',
                'user' => $this->model->get_one($_SESSION["id"])
            )
        );
    }
}