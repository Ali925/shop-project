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
                'form' => false,
                'formEdit' => false,
                'data' => $this->modelProducts->get_categories()
            )
        );
    }

    public function action_viewFormAdd(){
        $this->view->generate("adcategories_view.php", "adtemp_view.php",
            array(
                'title' => 'Категории',
                'form' => true,
                'formEdit' => false,
                'data' => $this->modelProducts->get_categories()
            )
        );
    }
    public function action_viewFormEdit($id){
        $this->view->generate("adcategories_view.php", "adtemp_view.php",
            array(
                'title' => 'Категории',
                'form' => false,
                'formEdit' => true,
                'category' => $this->modelProducts->get_one_category($id),
                'data' => $this->modelProducts->get_categories()
            )
        );
    }

    public function action_addCat($array){

        $title = strip_tags($array['title']);
        $title = strip_tags($title);
        $this->modelAdmin->add_Category($title);
        header("location: /AdCategories");
    }

    public function action_editCat($array){
        $id = strip_tags($array['id']);
        $title = strip_tags($array['title']);
        echo $id . " - " . $title;
        $this->modelAdmin->edit_Category($id, $title);
        header("location: /AdCategories");
    }

    public function action_delCat($id){
        $this->modelAdmin->delete_Category($id);

        header("location: /AdCategories");
    }
} 

?>