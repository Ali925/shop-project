<?php

class Controller_Products extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->model = new Model_Products;
    }

    function action_index()
    {   
        $user='';
        if(isset($_SESSION['user_id']))    
        $user = $_SESSION['user_id'];
        $this->view->generate('products/list_view.php', 'template_view.php',
            array(
                'title' => 'Список товаров',
                'products' => $this->model->get_data(),
                'incart' => $this->model->get_incart($user),
                 'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
    }

    function action_category($category) {
        $user = $_SESSION['user_id'];
        $data = $this->model->get_category($category);
        $title = $data[0]['category'];

        $this->view->generate('products/list_view.php', 'template_view.php',
            array(
                'title' => $title,
                'products' => $data,
                'incart' => $this->model->get_incart($user),
                 'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
    }

    function action_view($id){
        $id = (int)$id[0];
        $user = $_SESSION['user_id'];
        $data = $this->model->get_product($id);
        $this->view->generate('products/item_view.php', 'template_view.php',
            array(
                'title' => $data['title'],
                'product' => $data,
                'incart' => $this->model->get_incart($user),
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );


    }

}