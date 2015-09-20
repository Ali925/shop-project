<?php

class Controller_Contacts extends Controller
{
    function action_index()
    {
        $this->view->generate('contacts_view.php', 'template_view.php',
            array(
                'title' => 'Наши контакты',
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false
            )
        );
    }
}