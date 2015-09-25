<?php

class Controller_AdOrders extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Orders();
    }

    public function action_index(){
        $data = $this->model->get_all();
        $this->view->generate("View_AdOrders.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'data' => $data,
                'property' => $this->model->get_order_property()
            )
        );
    }
}