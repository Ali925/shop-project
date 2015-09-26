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
                'data' => $this->model->get_all(),
                'categories' => $this->model->get_categories()
            )
        );
    }
}