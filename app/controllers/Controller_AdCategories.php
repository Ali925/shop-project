<?php
include_once "app/models/model_products.php";
include_once "app/models/model_admin.php";
class Controller_AdCategories extends Controller{
    public function __construct(){
        parent::__construct();
        $this->modelProducts = new Model_Products;
        $this->modelAdmin = new Model_Admin;   
    }

    public function action_index(){
        $this->view->generate("adcategories_view.php", "adtemp_view.php",
            array(
                'title' => 'Категории',
                 'header' => '',
                'addForm' => false,
                'editForm' => false,
                'data' => $this->modelProducts->get_categories()
            )
        );
    }

    public function action_viewFormAdd(){
        $this->view->generate("adcategories_view.php", "adtemp_view.php",
            array(
                'title' => 'Категории',
                'header' => 'Добавление категории',
                'addForm' => true,
                'editForm' => false,
                'data' => null
            )
        );
    }
    public function action_viewFormEdit($id){
        $this->view->generate("adcategories_view.php", "adtemp_view.php",
            array(
                'title' => 'Категории',
                'header' => 'Редактирование категории',
                'addForm' => false,
                'editForm' => true,
                'category' => $this->modelProducts->get_one_category($id),
                'data' => null
            )
        );
    }

    public function action_addCat($array){

        $title = filter_var($array['title'], FILTER_SANITIZE_STRING);
        $this->modelAdmin->add_Category($title);
        header("location: /AdCategories");
    }

    public function action_editCat($array){
         $id = filter_var($array['id'], FILTER_VALIDATE_INT);
        $title = filter_var($array['title'], FILTER_SANITIZE_STRING);

        if($id && $title) {
            $this->modelAdmin->edit_Category($id, $title);
            header("location: /AdCategories");
        }else{
           $message = "Введены неверные данные";
            header("location: /Error/aderror/{$message}");

        }
    }

    public function action_delCat($id){
        $this->modelAdmin->delete_Category($id);

        header("location: /AdCategories");
    }
} 

?>