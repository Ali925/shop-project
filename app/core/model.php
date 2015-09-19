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

    public function get_all(){
        return \ORM::for_table($this->table)->find_many();
    }

    public function get_one($id){
        return \ORM::for_table($this->table)->find_one($id);
    }

    public function get_category($category){
        return \ORM::for_table("products")
            ->select_many("products.id", "products.title", "products.mark", "products.description", "products.price")
            ->join("categories", array("products.id_catalog","=", "categories.id"))
            ->where("categories.title", "=", $category)
            ->find_many();
    }

    public function get_auth_data($email){
        return \ORM::for_table("users")
            ->where("email", $email)
            ->find_one();
    }

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

    public function update_user($name=null, $lastname=null, $birthday=null, $email=null, $password=null, $is_active=null, $date_reg=null, $last_update=null){
        $last_update = (string)date_format(new \DateTime(), 'Y-m-d');
        $login = $_SESSION["login"];
        $parameters = func_get_args();
        $person = \ORM::for_table("users")->find_one($login);
        foreach($parameters as $parameter){
            if(isset($parameter)){
               $person->set(substr($parameter[0], 1), $parameter[1]);
            }
        }
        $person->save();



    }
}