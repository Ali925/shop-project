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

    public function action_viewFormAdd(){
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
        $title = filter_var($array['title'], FILTER_SANITIZE_STRING);

        $this->model->add_Category($title);

        header("location: /AdCategories");
    }

    public function action_editCat($array){
        $id = filter_var($array['id'], FILTER_VALIDATE_INT);
        $title = filter_var($array['title'], FILTER_SANITIZE_STRING);

        if($id && $title) {
            $this->model->edit_Category($id, $title);
            header("location: /AdCategories");
        }else{
//            $message = "<h3>Вы ввели некорректные данные</h3>";
//            Route::Error($message);
        }
    }

    public function action_delCat($id){
        $this->model->delete_Category($id);

        header("location: /AdCategories");
    }
} 