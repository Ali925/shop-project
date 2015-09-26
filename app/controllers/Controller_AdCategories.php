<?php
//Контроллер для работы администратора с категорями товаров
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
                'formEdit' => false,
                'data' => $this->model->get_all()
            )
        );
    }

    public function action_viewForm(){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => true,
                'formEdit' => false,
                'data' => $this->model->get_all()
            )
        );
    }
    public function action_viewFormEdit($id){
        $this->view->generate("View_AdCategories.php", "View_AdTemp.php",
            array(
                'title' => 'Категории',
                'form' => false,
                'formEdit' => true,
                'category' => $this->model->get_one($id),
                'data' => $this->model->get_all()
            )
        );
    }

    public function action_addCat($array){
        $title = htmlentities($array['title']);
        $title = htmlspecialchars($title);
        $this->model->add_Category($title);

        header("location: /AdCategories");
    }

    public function action_editCat($array){
        $id = htmlentities($array['id']);
        $title = htmlentities($array['title']);
        $this->model->edit_Category($id, $title);
        header("location: /AdCategories");
    }

    public function action_delCat($id){
        $this->model->delete_Category($id);

        header("location: /AdCategories");
    }
} 