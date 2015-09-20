<?php


class View{
    function generate($content_view, $View_Template, $data = null)
    {
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }



        include "app/views/".$View_Template;

    }
}