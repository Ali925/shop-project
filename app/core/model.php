<?php

abstract class Model
{
    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:dbname=shop;host=localhost', 'root', '');
    }

    public function get_data()
    {
    }
}