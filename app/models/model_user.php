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
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        $lastname = filter_var($array["lastname"], FILTER_SANITIZE_STRING);
        $birthday = $array["birthday"];
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $password1 = filter_var($array["pass1"], FILTER_SANITIZE_STRING);
        $password2 = filter_var($array["pass2"],FILTER_SANITIZE_STRING);
        $is_active = 0;
        $reg_date = (string)date_format(new \DateTime(), 'Y-m-d');
        $is_delete = 0;
        if($password1 !== $password2){
            $message = "Пароли не совпадают!";
            header("location: /Error/error/{$message}");
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
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        if(!$name) $name = null;
        $lastname = filter_var($array["lastname"], FILTER_SANITIZE_STRING);
        if(!$lastname) $lastname = null;
        $birthday = $array["birthday"];
        $date1 = strtotime($birthday);
        $date2 = (strtotime("0000-00-00"));
        if($date1 == $date2) $birthday = null;
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
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

    //создаем новый пароль для пользователя
    public function create_new_pass($array){
        require_once $_SERVER['DOCUMENT_ROOT']."/php-library/phpmailer/phpmailer/class.phpmailer.php";
        $user = \ORM::for_table('users')
            ->where(
                array(  "email" => $array['email'],
                        "lastname" => $array['lastname']))
            ->find_one();
        if(!$user){
            $message = "Пользователь с данным логином не зарегистрирован";
            header("location: /Error/error/{$message}");
            exit;
        }
        if(!$user['is_active']){
                $message = "К сожалению, ваш email не подтверждён. Свяжитесь с нами для восстановления доступа к Личному Кабинету";
                header("location: /Error/error/{$message}");
            exit;
        }
        $mail = new \PHPMailer();
        $mail->IsSendmail();
        $salt1 = "q0r@m";
        $salt2 = "8r#h";
        $newPass = self::generate_pass();
        $hashNewPass = md5($salt1.$newPass.$salt2);
        \ORM::for_table('users')->find_one($user['id'])
            ->set("password", $hashNewPass)
            ->save();
        $body = "<br/>Ваш новый пароль: <b>$newPass</b><br/><h3>Запомните Ваш новый пароль и удалите это письмо!</h3>
                Для авторизации пройдите по ссылке ниже<br/><br/>
                 <a href='www.commercetechs.com/user/auth'>www.commercetechs.com</a>";
        $mail->AddReplyTo("support@commercetechs.com","First Last");
        $mail->SetFrom('support@commercetechs.com', 'First Last');
        $address = $array['email'];
        $username = $array['name']." ".$array['lastname'];
        $mail->AddAddress($address, $username);
        $mail->Subject    = "Восстановление пароля на Commercetechs.com";
        $mail->MsgHTML($body);
        if(!$mail->Send()) {
            echo "Произошла ошибка: " . $mail->ErrorInfo;
        }
    }
//
    public function email_activate($array){
        if(!is_array($array)){
            $array = \ORM::for_table('users')->find_one($array);
            $date = $array["reg_date"];
        }
        else{
         $date = new DateTime();
         $date = (int)$date;
        }
        $name = strip_tags($array["name"]);
        $lastname = strip_tags($array["lastname"]);
        $email = ($array["email"]);
        $hash = md5($email.$date);
        $body = "<br/>Здравствуйте, $name $lastname!<br/><br/>Вы успешно зарегистрировались на сайте www.commercetechs.com.<br/>
                Вам пришло это письмо для того, чтобы вы смогли подтвердить свой почтовый адрес (он необходим для
                восстановления доступа к Личному Кабинету в случае утраты пароля).<br/><br/>
                 <a href='www.commercetechs.com/User/activateEmail/$hash'>Для поддтверждения адреса Вам необходимо пройти по этой ссылке</a>";
                
        $mail = new PHPMailer();
        $mail->CharSet = 'utf-8';
        $mail->IsSendmail();
        $mail->AddReplyTo("support@commercetechs.com","First Last");
        $mail->SetFrom('support@commercetechs.com', 'First Last');
        $address = $email;
        $username = $name." ".$lastname;
        $mail->AddAddress($address, $username);
        $mail->Subject = "Пожалуйста, подтвердите свой email";
        $mail->MsgHTML($body);
        if(!$mail->Send()) {
            echo "Произошла ошибка: " . $mail->ErrorInfo;
        }
    }

    public function change_pass($id, $pass){
        $user = \ORM::for_table('users')->find_one($id);
        $user->set('password', $pass);
        $user->save();
    }
//генерация случайного пароля
    static function generate_pass () {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for ($i = 0; $i <= $length; $i++) {
            $result .= $characters[mt_rand (0, strlen ($characters) - 1)];
        }
        return $result;
    }
   
    
}

?>