<?php

class Controller_AdCategories extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new \Shop\Model\Categories();
    }

    public function action_index(){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'data' => $this->model->get_all()
            )
        );
    }
} 