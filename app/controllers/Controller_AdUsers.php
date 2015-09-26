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
                'data' => $this->model->get_all()
            )
        );
    }
}