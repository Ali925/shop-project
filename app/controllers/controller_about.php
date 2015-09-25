<?php
//Контроллер для страницы о магазине
class Controller_About extends Controller{
    function action_index(){
        $this->view->generate("about_view.php", "template_view.php",
            array(
                "title" => "О нас",
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => false
            )
        );
    }
}