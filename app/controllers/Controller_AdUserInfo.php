<?php

class Controller_AdUserInfo extends Controller {
    public function __construct(){
        parent::__construct();
        $this->model = new \Shop\Model\Users();
    }

    public function action_index(){
        $this->view->generate("View_AdUserInfo.php", "View_AdTemp.php",
            array(
                'title' => 'Покупатель'
            )
        );
    }

    public function action_user($array){
        $this->view->generate("View_AdUserInfo.php", "View_AdTemp.php",
            array(
                'title' => 'Покупатель',
                'data' => $this->model->get_one($array[0])
            )
        );
    }


} 