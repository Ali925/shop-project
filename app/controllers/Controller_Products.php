<?php
//Контроллер для работы с каталогом
class Controller_Products extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Products();

    }

    function action_index(){
        $this->view->generate('View_Products.php', 'View_Template.php',
            array(
                'title' => 'Список товаров',
                'products' => $this->model->get_all()
            )
        );
    }

    function action_item($id){
        $this->view->generate('View_One.php', 'View_Template.php',
            array(
                'title' => 'Список товаров',
                'products' => $this->model->get_one($id)
            )
        );
    }

    function action_category($category){
        $this->view->generate('View_Category.php', 'View_Template.php',
            array(
                'title' => 'Список товаров',
                'products' => $this->model->get_category($category)
            )
        );
    }
}