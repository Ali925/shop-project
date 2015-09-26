<?php
//Контроллер для работы с каталогом
class Controller_Edit extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Users();
    }

    function action_index(){

        $this->view->generate('View_Edit.php', 'View_Template.php',
            array(
                'title' => 'Изменение личных данных',
                'user' => $this->model->get_one($_SESSION["id"])
            )
        );
    }
//Получаем новые значения пользовательских данных
    function action_editUser($array){
        $this->model->update_user($array);

        header("location: /Users");
    }
}