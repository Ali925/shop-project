<?php

class Model_User extends Model

{
		protected $table= "users";

        public function get_user($id){
        return \ORM::for_table("users")->find_one($id); 
    }

        public function get_users(){
            return \ORM::for_table("users")->find_many(); 
        }

		public function get_auth_data($email){
        return \ORM::for_table("users")
            ->where("email", $email)
            ->find_one();
    }

    public function reg_user($array){
        $salt1= "q0r@m";
        $salt2 = "8r#h";
        $name = strip_tags($array["name"]);
        $lastname = strip_tags($array["lastname"]);
        $birthday = $array["birthday"];
        $email = strip_tags($array["email"]);
        $password1 = htmlentities($array["pass1"]);
        $password2 = htmlentities($array["pass2"]);
        $is_active = 0;
        $reg_date = (string)date_format(new \DateTime(), 'Y-m-d');
        $is_delete = 0;
        if($password1 !== $password2){
            echo <<<HERE
            <div class='alarm'>
                <h3>Пароли не совпадают</h3>
                <a href='/Registration'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        }else {
            $password = md5($salt1 . $password1 . $salt2);

            $person = \ORM::for_table("users")->create();
            $person->name = $name;
            $person->lastname = $lastname;
            $person->birthday = $birthday;
            $person->email = $email;
            $person->password = $password;
            $person->is_active = $is_active;
            $person->reg_date = $reg_date;
            $person->is_delete = $is_delete;
            $person->save();
        }
    }

    //администратор удаляет пользователя
    public function delete_user($id){
        $person = \ORM::for_table("users")->find_one($id);
        $person->set("is_delete", 1);
        $person->save();
    }
//администратор активирует пользователя
    public function activate_User($id){
        $person = \ORM::for_table("users")->find_one($id);
        $person->set("is_active", 1);
        $person->save();
    }

   public function update_user($array){
        $name = strip_tags($array["name"]);
        if(!$name) $name = null;
        $lastname = strip_tags($array["lastname"]);
        if(!$lastname) $lastname = null;
        $birthday = $array["birthday"];
        $date1 = strtotime($birthday);
        $date2 = (strtotime("0000-00-00"));
        if($date1 == $date2) $birthday = null;
        $email = strip_tags($array["email"]);
        if(!$email) $email = null;
        $last_update = (string)date_format(new \DateTime(), 'Y-m-d');

        $id = $array['id'];
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

    public function get_count($user) {

            return \ORM::for_table('cart')->where("id_user", $user)->count();

       }

	
}

?>