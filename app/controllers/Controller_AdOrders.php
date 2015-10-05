<?php
include_once "app/models/model_user.php";
include_once "app/models/model_products.php";
include_once "app/models/model_admin.php";

class Controller_AdOrders extends Controller{
    public function __construct(){
        parent::__construct();
        $this->modelProducts = new Model_Products;
        $this->modelUser = new Model_User;
        $this->modelAdmin = new Model_Admin;
    }

    public function action_index(){
        $data = $this->modelProducts->get_orders();
        $property = $this->modelProducts->get_order_property();
        $this->view->generate("adorders_view.php", "adtemp_view.php",
            array(
                'title' => 'Заказы',
                'editForm' => false,
                'data' => $data,
                'property' => $property
            )
        );
    }

    public function action_viewFormEdit($id){
        $this->view->generate("adorders_view.php", "adtemp_view.php",
            array(
                'title' => 'Заказы',
                'editForm' => true,
                'data' => null,
                'order' => $this->modelProducts->get_order($id),
                'property' => $this->modelProducts->get_one_order_property($id)
            )
        );
    }

    public function action_user($id){
        $data[] = $this->modelUser->get_user($id);
        $this->view->generate("adusers_view.php", "adtemp_view.php",
            array(
                'title' => 'Заказы',
                'editForm' => false,
                'data' => $data
            )
        );
    }

    public function action_product($id){
        $data[] = $this->modelProducts->get_product($id);
        $categories = $this->modelProducts->get_categories();
        $this->view->generate("adproducts_view.php", "adtemp_view.php",
            array(
                'title' => 'Заказы',
                'editForm' => false,
                'categories' => $categories,
                'data' => $data
            )
        );
    }

    public function action_editOrder($array){
        $this->modelAdmin->edit_Order($array);

        header("location: /AdOrders");
    }
}

?>