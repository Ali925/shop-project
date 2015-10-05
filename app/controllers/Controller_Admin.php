<?php

class Controller_Admin extends Controller{
    public function __construct(){
        parent::__construct();

        if($_SESSION["type"] !== "admin") {
            header("location: /AdAuth");
        }
    }

    function action_index(){
        $this->view->generate("admin_view.php", "adtemp_view.php",
            array(
                'title' => 'Админка'
            )
        );
    }
} 