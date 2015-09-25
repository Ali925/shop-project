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
    function action_changeData($array){
        $name = strip_tags($array["name"]);
        if(!$name) $name = null;
        $lastname = strip_tags($array["lastname"]);
        if(!$lastname) $lastname = null;
        $birthday = $array["birthday"];
        $date1 = strtotime($birthday);
        $date2 = (strtotime("0000-00-00"));
        if($date1 == $date2) $birthday = null;
        $email = strip_tags($array["mail"]);
        if(!$email) $email = null;
        $last_update = (string)date_format(new DateTime(), 'Y-m-d');

        $this->model->update_user($name, $lastname, $birthday, $email, $last_update);
        header("location: /Users");
    }
}