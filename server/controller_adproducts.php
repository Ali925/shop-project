<?php

include_once "app/models/model_products.php";
include_once "app/models/model_admin.php";

class Controller_AdProducts extends Controller{
    public function __construct(){
        parent::__construct();
        $this->modelProducts = new Model_Products;
        $this->modelAdmin = new Model_Admin;
    }

    public function action_index(){
        $this->view->generate("adproducts_view.php", "adtemp_view.php",
            array(
                'title' => 'Товары',
                'header' => '',
                'addForm' => false,
                'editForm' => false,
                'data' => $this->modelProducts->get_data(),
                'categories' => $this->modelProducts->get_categories()
            )
        );
    }

    public function action_viewFormAdd(){
        $this->view->generate("adproducts_view.php", "adtemp_view.php",
            array(
                'title' => 'Товары',
                'header' => 'Добавление нового товара',
                'addForm' => true,
                'editForm' => false,
                'data' => null,
                'categories' => $this->modelProducts->get_categories()
            )
        );
    }

    public function action_viewFormEdit($id){
        $this->view->generate("adproducts_view.php", "adtemp_view.php",
            array(
                'title' => 'Товары',
                'header' => 'Редактирование товара',
                'addForm' => false,
                'editForm' => true,
                'data' => null,
                'categories' => $this->modelProducts->get_categories(),
                'product' => $this->modelProducts->get_product($id)
            )
        );
    }

    public function action_addProduct($array){
        $categories = $this->modelProducts->get_categories();
        $this->modelAdmin->add_Product($array, $categories);

        header("location: /AdProducts");
    }

    public function action_delProduct($id){
        $this->modelAdmin->delete_Product($id);

        header("location: /AdProducts");
    }

    public function action_editProduct($array){
        $categories = $this->modelProducts->get_categories();
        $this->modelAdmin->edit_Product($array, $categories);

        header("location: /AdProducts");
    }
}