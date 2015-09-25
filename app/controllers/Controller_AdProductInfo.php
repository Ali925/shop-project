<?php

class Controller_AdProductInfo extends Controller {
    public function __construct(){
        parent::__construct();
        $this->model = new \Shop\Model\Products();
    }

    public function action_index(){
        $this->view->generate("View_AdProductInfo.php", "View_AdTemp.php",
            array(
                'title' => 'Товар'
            )
        );
    }

    public function action_item($array){
        $this->view->generate("View_AdProductInfo.php", "View_AdTemp.php",
            array(
                'title' => 'Товар',
                'data' => $this->model->get_one($array[0]),
                'category' => $this->model->get_categories()
            )
        );
    }

} 