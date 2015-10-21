<?php

class Controller_404 extends Controller{


        function action_index()
        {
            $this->view->generate('404_view.php', 'template_view.php',
                array(
                    'title' => 'Ошибка 404',
                    'is_photo_slider' => false,
                  	'is_slider' => false,
                	'is_right_sidebar' => false,
                    'is_left_navbar' => true,
                    'is_carousel' => true
                )
            );
        }


}