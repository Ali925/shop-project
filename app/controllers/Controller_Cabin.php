<?php
//Контроллер для работы с каталогом
class Controller_Cabin extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\User();
    }

    function action_index(){
        $data = $this->model->get_auth_data($_SESSION["name"]);
        $this->view->generate('View_Cabin.php', 'View_Template.php',
            array(
                'title' => 'Личный кабинет',
                "username" => $data['name']
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