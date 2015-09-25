<?php
namespace Shop\Model;

abstract class Model
{
    protected $table="";

    public function __construct(){
        \ORM::configure("mysql:host=localhost;dbname=shop");
        \ORM::configure("username", "root");
        \ORM::configure("password", "");
    }
//получаем все содержимое из таблицы
    public function get_all(){
        return \ORM::for_table($this->table)->find_many();
    }
//получаем одну запись из таблицы
    public function get_one($id){
        return \ORM::for_table($this->table)->find_one($id);
    }
//получаем список категорий товаров
    public function get_categories(){
        return \ORM::for_table("categories")->find_many();
    }
//получаем список товаров конкретной категории
    public function get_one_category($category){
        return \ORM::for_table("products")
            ->where("products.id_catalog", $category)
            ->find_many();
    }

//получаем подробности заказов
    public function get_order_property(){
        return \ORM::for_table("order_property")
            ->find_many();
    }

//получаем подробности конкретного заказа
    public function get_one_order_property($id){
        return \ORM::for_table("order_property")
            ->where("order_property.id", $id)
            ->find_one();
    }

//получаем данные пользователя из БД для сравнения с введенными данными для авторизации
    public function get_auth_user($email){
        return \ORM::for_table("users")
            ->where("email", $email)
            ->find_one();
    }

//получаем данные админа из БД для сравнения с введенными данными для авторизации
    public function get_auth_ad($name){
        return \ORM::for_table("admins")
            ->where("name", $name)
            ->find_one();
    }

//добавляем в БД нового пользователя
    public function reg_user($name, $lastname, $birthday, $email, $password, $is_active, $reg_date, $last_update){
        $person = \ORM::for_table("users")->create();
        $person->name = $name;
        $person->lastname = $lastname;
        $person->birthday = $birthday;
        $person->email = $email;
        $person->password = $password;
        $person->is_active = $is_active;
        $person->reg_date = $reg_date;
        $person->last_update = $last_update;
        $person->save();
    }
//редактируем данные пользователя
    public function update_user($name=null, $lastname=null, $birthday=null, $email=null, $last_update){
        $id = $_SESSION["id"];
        $person = \ORM::for_table("users")->find_one($id);
        if(isset($name)){
            $person->set('name', $name);
            $person->set('last_update', $last_update);
        }
        if(isset($lastname)){
            $person->set('lastname', $lastname);
            $person->set('last_update', $last_update);
        }
        if(isset($birthday)){
            $person->set('birthday', $birthday);
            $person->set('last_update', $last_update);
        }
        if(isset($email)){
            $person->set('email', $email);
            $person->set('last_update', $last_update);
        }
        $person->save();
    }
//админ добавляет категорию
    public function add_Category($title){
        $category = \ORM::for_table("categories")->create();
        $category->set('title', $title);
        $category->save();
    }
}