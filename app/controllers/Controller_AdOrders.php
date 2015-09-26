<?php
//Контроллер для работы администратора с заказами
class Controller_AdOrders extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Orders();
    }

    public function action_index(){
        $data = $this->model->get_all();
        $property = $this->model->get_order_property();
        $this->view->generate("View_AdOrders.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'data' => $data,
                'property' => $property
            )
        );
    }

    public function action_user($id){
        $data[] = $this->model->get_user($id);
        $this->view->generate("View_AdUsers.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'data' => $data
            )
        );
    }

    public function action_product($id){
        $data[] = $this->model->get_product($id);
        $categories = $this->model->get_categories();
        $this->view->generate("View_AdProducts.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'categories' => $categories,
                'data' => $data
            )
        );
    }
}