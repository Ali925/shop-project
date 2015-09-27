<?php
//Контроллер для работы администратора с товарами
class Controller_AdProducts extends Controller{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Products();
    }

    public function action_index(){
        $this->view->generate("View_AdProducts.php", "View_AdTemp.php",
            array(
                'title' => 'Товары',
                'addForm' => false,
                'editForm' => false,
                'data' => $this->model->get_all(),
                'categories' => $this->model->get_categories()
            )
        );
    }

    public function action_viewFormAdd(){
        $this->view->generate("View_AdProducts.php", "View_AdTemp.php",
            array(
                'title' => 'Товары',
                'addForm' => true,
                'editForm' => false,
                'data' => $this->model->get_all(),
                'categories' => $this->model->get_categories()
            )
        );
    }

    public function action_viewFormEdit($id){
        $this->view->generate("View_AdProducts.php", "View_AdTemp.php",
            array(
                'title' => 'Товары',
                'addForm' => false,
                'editForm' => true,
                'data' => null,
                'categories' => $this->model->get_categories(),
                'product' => $this->model->get_one($id)
            )
        );
    }

    public function action_addProduct($array){
        $categories = $this->model->get_categories();
        $this->model->add_Product($array, $categories);

        header("location: /AdProducts");
    }

    public function action_delProduct($id){
        $this->model->delete_Product($id);

        header("location: /AdProducts");
    }

    public function action_editProduct($array){
        $categories = $this->model->get_categories();
        $this->model->edit_Product($array, $categories);

        header("location: /AdProducts");
    }
}