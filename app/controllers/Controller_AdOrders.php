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
                'header' => '',
                'editForm' => false,
                'data' => $data,
                'property' => $property
            )
        );
    }

    public function action_viewFormEdit($id){
        $this->view->generate("View_AdOrders.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'header' => 'Изменение статуса заказа',
                'editForm' => true,
                'data' => null,
                'order' => $this->model->get_one($id),
                'property' => $this->model->get_order_property()
            )
        );
    }

    public function action_user($id){
        $data[] = $this->model->get_user($id);
        $this->view->generate("View_AdUsers.php", "View_AdTemp.php",
            array(
                'title' => 'Заказы',
                'header' => 'Данные пользователя',
                'editForm' => false,
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
                'header' => 'Данные товара',
                'categories' => $categories,
                'editForm' => false,
                'data' => $data
            )
        );
    }

    public function action_editOrder($array){
        $this->model->edit_Order($array);

        header("location: /AdOrders");
    }
}