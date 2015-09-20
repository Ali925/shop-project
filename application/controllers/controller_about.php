<?php

class Controller_About extends Controller{

    function action_index()
    {
        $this->view->generate('about/index_view.php', 'template_view.php',
            array(
                'title' => 'Страница о компании',
                	'is_right_sidebar' => true, 
                	'is_photo_slider' => false,
                  	'is_slider' => false
            )
        );
    }

}