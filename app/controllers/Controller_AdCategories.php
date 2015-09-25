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
                'form' => false,
                'data' => $this->model->get_all()
            )
        );
    }

    public function action_viewForm(){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => true,
                'data' => $this->model->get_all()
            )
        );
    }

    public function action_addCat($array){
        $title = htmlentities($array['title']);
        $title = htmlspecialchars($title);
        $this->model->add_Category($title);
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => false,

                'data' => $this->model->get_all()
            )
        );
    }

    public function action_editCat($id){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => false,
                'data' => $this->model->get_one($id)
            )
        );
    }

    public function action_delCat($id){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => false,
                'data' => $this->model->delete_Category($id)
            )
        );
    }
} 