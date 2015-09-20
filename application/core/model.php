<?php

abstract class Model
{
    /**
     * @var PDO
     */
    protected $_pdo;

    public function __construct(){
        $this->_pdo = new PDO('mysql:dbname=shop;host=localhost', 'ali', 'men8deoxu');
        $query = "SET NAMES UTF8";
        $p = $this->_pdo->prepare($query);
        $p->execute();
    }


    public function get_data()
    {
    }
}