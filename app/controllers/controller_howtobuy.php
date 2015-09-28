<?php

class Controller_Howtobuy extends Controller{


        function action_index()
        {
            $this->view->generate('howtobuy_view.php', 'template_view.php',
                array(
                    'title' => 'Как купить',
                    'is_photo_slider' => false,
                  	'is_slider' => false,
                	'is_right_sidebar' => false,
                    'is_left_navbar' => true
                )
            );
        }


}