<?php
//Контроллер для работы с каталогом
class Controller_Products extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_Products();
    }
//выводим все товары
    function action_index(){
        $this->view->generate("View_Products.php", "View_Template.php",
            array(
                "title" => "Список товаров",
                "products" => $this->model->get_products()
            )
        );
    }
//Выводим данные по конкретной категории
    function action_category($category){
        $category = (string)$category;
        $data = $this->model->get_category($category);
        $this->view->generate("View_Category.php", "View_Template.php",
            array(
                "title" => $category,
                "products" => $data
            )
        );
    }
//Выводим данные по конкретному товару
    function action_item($id){
        $id = (int)$id;
        $data = $this->model->get_item($id);
        $this->view->generate("View_Item.php", "View_Template.php",
            array(
                "title" => $data["title"],
                "item" => $data
            )
        );
    }
}