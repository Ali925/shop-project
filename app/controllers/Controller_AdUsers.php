<?php
//Контроллер для работы администратора с пользователями
class Controller_AdUsers extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Users();
    }

    public function action_index(){
        $this->view->generate("View_AdUsers.php", "View_AdTemp.php",
            array(
                'title' => 'Пользователи',
                'header' => '',
                'addForm' => false,
                'editForm' => false,
                'data' => $this->model->get_all()
            )
        );
    }
    public function action_viewFormAdd(){
        $this->view->generate("View_AdUsers.php", "View_AdTemp.php",
            array(
                'title' => 'Пользователи',
                'header' => 'Добавление нового пользователя',
                'addForm' => true,
                'editForm' => false,
                'data' => null
            )
        );
    }
    public function action_viewFormEdit($id){
        $this->view->generate("View_AdUsers.php", "View_AdTemp.php",
            array(
                'title' => 'Пользователи',
                'header' => 'Редактирование пользователя',
                'addForm' => false,
                'editForm' => true,
                'user' => $this->model->get_one($id),
                'data' => null
            )
        );
    }

    public function action_addUser($array){
        $this->model->reg_user($array);

        header("location: /AdUsers");
    }

    public function action_delUser($id){
        $this->model->delete_user($id);

        header("location: /AdUsers");
    }

    public function action_actUser($id){
        $this->model->activate_user($id);

        header("location: /AdUsers");
    }

    public function action_editUser($array){
        $this->model->update_user($array);

        header("location: /AdUsers");
    }
}