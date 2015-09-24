<?php

abstract class Model
{

    protected $table;

    public function __construct(){

        \ORM::configure("mysql:host=localhost;dbname=shop");
        \ORM::configure("username", "ali");
        \ORM::configure("password", "men8deoxu");
        \ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
    }

}