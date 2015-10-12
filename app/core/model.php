<?php

namespace Shop\Model;

define("SALT1", "q0r@m");
define("SALT2", "8r#h");

abstract class Model
{
    protected $table = "";

    public function __construct()
    {
        \ORM::configure("mysql:host=localhost;dbname=shop");
        \ORM::configure("username", "root");
        \ORM::configure("password", "");
    }

//получаем все содержимое из таблицы
    public function get_all()
    {
        return \ORM::for_table($this->table)->find_many();
    }

//получаем одну запись из таблицы
    public function get_one($id)
    {
        return \ORM::for_table($this->table)->find_one($id);
    }

//получаем список категорий товаров
    public function get_categories()
    {
        return \ORM::for_table("categories")->find_many();
    }

//получаем информацияю о пользователе
    public function get_user($id)
    {
        return \ORM::for_table("users")->find_one($id);
    }

//получаем информацияю о товаре
    public function get_product($id)
    {
        return \ORM::for_table("products")->find_one($id);
    }

//получаем список товаров конкретной категории
    public function get_one_category($category)
    {
        return \ORM::for_table("products")
            ->where("products.id_catalog", $category)
            ->find_many();
    }

//получаем подробности заказов
    public function get_order_property()
    {
        return \ORM::for_table("order_property")->find_many();
    }

//получаем подробности конкретного заказа
    public function get_one_order_property($id)
    {
        return \ORM::for_table("order_property")
            ->where("order_property.id", $id)
            ->find_one();
    }

//получаем данные пользователя из БД для сравнения с введенными данными для авторизации
    public function get_auth_user($email)
    {
        return \ORM::for_table("users")
            ->where("email", $email)
            ->find_one();
    }

//получаем данные админа из БД для сравнения с введенными данными для авторизации
    public function get_auth_ad($name)
    {
        return \ORM::for_table("admins")
            ->where("name", $name)
            ->find_one();
    }

//добавляем в БД нового пользователя
    public function reg_user($array)
    {
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        $lastname = filter_var($array["lastname"], FILTER_SANITIZE_STRING);
        $birthday = $array["birthday"];
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $password1 = filter_var($array["pass1"], FILTER_SANITIZE_STRING);
        $password2 = filter_var($array["pass2"],FILTER_SANITIZE_STRING);
        $is_active = 0;
        $reg_date = (string)date_format(new \DateTime(), 'Y-m-d');
        $last_update = (string)date_format(new \DateTime(), 'Y-m-d');
        $is_delete = 0;
        if($name && $lastname && $email && $password1 && $password2){
            if ($password1 !== $password2) {
//                $message = "
//                    <div class='alarm'>
//                        <h3>Пароли не совпадают</h3>
//                        <a href='/Registration'><button>Попробовать ещё раз</button></a>
//                        <a href='/Main'><button>Вернуться на главную</button></a>
//                    </div>";
//                \Route::Error($message);
            } else {
                $password = md5(SALT1 . $password1 . SALT2);

                $person = \ORM::for_table("users")->create();
                $person->name = $name;
                $person->lastname = $lastname;
                $person->birthday = $birthday;
                $person->email = $email;
                $person->password = $password;
                $person->is_active = $is_active;
                $person->reg_date = $reg_date;
                $person->last_update = $last_update;
                $person->is_delete = $is_delete;
                $person->save();
            }
        }else{
//            $message = "<h3>Вы ввели некорректные данные</h3>";
//            \Route::Error($message);
        }
    }

//авторизация пользователя
    public function authorization_user($array, $userData){

        $password = md5(SALT1.$array["pass"].SALT2);

        $true_login = $userData["email"];
        $true_password = $userData["password"];

        if(!$true_login){
//            $message = "
//                <div class='alarm'>
//                    <h3>Пользователь с данным логином не зарегистрирован</h3>
//                    <a href='/Authorization'><button>Попробовать ещё раз</button></a>
//                    <a href='/Main'><button>Вернуться на главную</button></a>
//                </div>";
//            \Route::Error($message);
        }elseif($password !== $true_password){
//            $message = "
//                <div class='alarm'>
//                    <h3>Вы ввели неверный пароль</h3>
//                    <a href='/Authorization'><button>Попробовать ещё раз</button></a>
//                    <a href='/Main'><button>Вернуться на главную</button></a>
//                </div>";
//            \Route::Error($message);
        }else{
            $_SESSION["name"] = $userData["name"];
            $_SESSION["id"] = $userData["id"];
            $_SESSION["type"] = "user";

            header("location: /");
        }
    }

//администратор удаляет пользователя
    public function delete_user($id)
    {
        $person = \ORM::for_table("users")->find_one($id);
        $person->set("is_delete", 1);
        $person->save();
    }

//администратор активирует пользователя
    public function activate_User($id)
    {
        $person = \ORM::for_table("users")->find_one($id);
        $person->set("is_active", 1);
        $person->save();
    }

//редактируем данные пользователя
    public function update_user($array)
    {
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        if (!$name) $name = null;
        $lastname = filter_var($array["lastname"], FILTER_SANITIZE_STRING);
        if (!$lastname) $lastname = null;
        $birthday = $array["birthday"];
        $date1 = strtotime($birthday);
        $date2 = (strtotime("0000-00-00"));
        if ($date1 == $date2) $birthday = null;
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        if (!$email) $email = null;
        $last_update = (string)date_format(new \DateTime(), 'Y-m-d');

        $id = $array['id'];

        $person = \ORM::for_table("users")->find_one($id);
        if (isset($name)) {
            $person->set('name', $name);
            $person->set('last_update', $last_update);
        }
        if (isset($lastname)) {
            $person->set('lastname', $lastname);
            $person->set('last_update', $last_update);
        }
        if (isset($birthday)) {
            $person->set('birthday', $birthday);
            $person->set('last_update', $last_update);
        }
        if (isset($email)) {
            $person->set('email', $email);
            $person->set('last_update', $last_update);
        }
        $person->save();
    }

//админ добавляет категорию
    public function add_Category($title)
    {
        $category = \ORM::for_table("categories")->create();
        $category->set('title', $title);
        $category->save();
    }

//админ удаляет категорию
    public function delete_Category($id)
    {
        $category = \ORM::for_table("categories")->find_one($id);
        $category->delete();
    }

//админ изменяет категорию
    public function edit_Category($id, $title)
    {
        $category = \ORM::for_table("categories")->find_one($id);
        $category->set('title', $title);
        $category->save();
    }

//админ редактирует товар
    public function edit_Product($product, $categories)
    {
        $mark = filter_var($product['mark'], FILTER_SANITIZE_STRING);
        $title = filter_var($product['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($product['description'], FILTER_SANITIZE_STRING);
        $count = intval($product['count']);
        $price = doubleval($product['price']);
        $old_file = filter_var($product['old_file'], FILTER_SANITIZE_STRING);
        $new_file = "";

        if($_FILES['link']){
            $file_temp = $_FILES['link']['tmp_name'];
            $file = $_FILES['link']['name'];
            $path_to_file = $_SERVER['DOCUMENT_ROOT']."/img/content/items/";
            $file_ext = explode(".", $file);
            $file_ext = $file_ext[count($file_ext)-1];

            if($_FILES['link']['size'] >= 2048000){
    //             $message = "Размер файла не должен превышать 2МБ";
    //
    //             Route::Erorr($message);
            }elseif($_FILES['link']['size'] >= 0 && $_FILES['link']['size'] <= 2048000){
                if($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png"){
    //             $message = "Файл должен иметь одно из следующих расширений: '.jpg', '.jpeg', '.png'!";
    //
    //             Route::Erorr($message);
                }
                if(!move_uploaded_file($file_temp, $path_to_file.$file)) {
    //             $message = "Не удалось загрузить файл";
    //
    //             Route::Erorr($message);
                }else{
                    if(file_exists($path_to_file.$old_file)) {
                        unlink($path_to_file . $old_file);
                    }
                    rename($path_to_file.$file, $path_to_file.explode(".",$old_file)[0].".".$file_ext);
                }
            }
        }

        if($mark && $title && $description && $count && $price) {
            $id_catalog = 1;
            foreach ($categories as $category) {
                if ($category['title'] === $product['id_catalog']) {
                    $id_catalog = $category['id'];
                    break;
                }
            }

            $product = \ORM::for_table("products")->find_one($product['id']);
            $product->set('title', $title);
            $product->set('mark', $mark);
            $product->set('count', $count);
            $product->set('price', $price);
            $product->set('description', $description);
            $product->set('id_catalog', $id_catalog);
            if($new_file){
                $product->set('link', $new_file);
            }
            $product->save();
        } else {
//            $message = "<h3>Вы ввели некорректные данные</h3>";
//
//            \Route::Error($message);
        }
    }

//админ удаляет товар
    public function delete_Product($id)
    {
        $path_to_photo = $_SERVER['DOCUMENT_ROOT']."/img/content/items/";
        $product = \ORM::for_table("products")->find_one($id);
        unlink($path_to_photo.$product['link']);
        $product->delete();

    }

//админ добавляет товар
    public function add_Product($product, $categories)
    {
        $mark = filter_var($product['mark'], FILTER_SANITIZE_STRING);
        $title = filter_var($product['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($product['description'], FILTER_SANITIZE_STRING);
        $count = intval($product['count']);
        $price = doubleval($product['price']);

        $file_temp = $_FILES['link']['tmp_name'];
        $file = $_FILES['link']['name'];
        $path_to_file = $_SERVER['DOCUMENT_ROOT']."/img/content/items/";
        $file_ext = explode(".", $file);
        $file_ext = $file_ext[count($file_ext)-1];

        if($_FILES['link']['size'] >= 2048000){
//             $message = "Размер файла не должен превышать 2МБ";
//
//             Route::Erorr($message);
         }elseif($_FILES['link']['size'] >= 0 && $_FILES['link']['size'] <= 2048000){
            if($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png"){
//             $message = "Файл должен иметь одно из следующих расширений: '.jpg', '.jpeg', '.png'!";
//
//             Route::Erorr($message);
            }
            if(!move_uploaded_file($file_temp, $path_to_file.$file)) {
//             $message = "Не удалось загрузить файл";
//
//             Route::Erorr($message);
            }
         }

        if ($mark && $title && $description && $count && $price) {

            $id_catalog = 1;
            foreach ($categories as $category) {
                if ($category['title'] === $product['id_catalog']) {
                    $id_catalog = $category['id'];
                    break;
                }
            }

            $product = \ORM::for_table("products")->create();
            $product->title = $title;
            $product->mark = $mark;
            $product->description = $description;
            $product->count = $count;
            $product->price = $price;
            $product->id_catalog = $id_catalog;
            if($product->save()){
                $item = \ORM::for_table("products")
                    ->where(
                        array(
                            "title" => $title,
                            "mark" => $mark,
                            "description" => $description,
                            "count" => $count,
                            "price" => $price,
                            "id_catalog" => $id_catalog))
                    ->find_one();

                $new_name = $item['id'].".".$file_ext;

                rename($path_to_file.$file, $path_to_file.$new_name);

                $item = \ORM::for_table("products")->find_one($item['id']);
                $item->set("link", $new_name);
                $item->save();
            }
        }else{
//            $message = "<h3>Вы ввели некорректные данные</h3>";
//
//            \Route::Error($message);
        }
    }

//админ меняет статус заказа
    public function edit_Order($array)
    {
        $order = \ORM::for_table("orders")->find_one($array['id']);
        $order->set('status', $array['status']);
        $order->save();
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
            echo <<<HERE
                <h3>Пользователь с указанными Вами данными не зарегистрирован</h3>
                <a href='/Authorization/createNewPassword'><button>Попробовать ещё раз</button></a>
                <a href='/Contacts'><button>Связаться с нами</button></a>
HERE;
            exit;
        }
        if(!$user['is_active']){
            echo <<<HERE
                <h3>К сожалению, ваш email не подтверждён. Свяжитесь с нами для восстановления доступа к Личному Кабинету</h3>
                <a href='/'><button>Отмена</button></a>
                <a href='/Contacts'><button>Связаться с нами</button></a>
HERE;
            exit;
        }

        $mail = new \PHPMailer();
        $mail->IsSendmail();

        $newPass = self::generate_pass();
        $hashNewPass = md5(SALT1.$newPass.SALT2);

        \ORM::for_table('users')->find_one($user['id'])
            ->set("password", $hashNewPass)
            ->save();

        $body = "<br/>Ваш новый пароль: <b>$newPass</b><br/><h3>Запомните Ваш новый пароль и удалите это письмо!</h3>
                Для авторизации пройдите по ссылке ниже<br/><br/>
                 <a href='www.commercetech.tk/Authorization'>www.commercetech.tk</a>";

        $mail->AddReplyTo("support@commercetech.tk","First Last");
        $mail->SetFrom('support@commercetech.tk', 'First Last');

        $address = $array['email'];
        $username = $array['name']." ".$array['lastname'];

        $mail->AddAddress($address, $username);
        $mail->Subject    = "Восстановление пароля на Commercetech.tk";
        $mail->MsgHTML($body);

        if(!$mail->Send()) {
            echo "Произошла ошибка: " . $mail->ErrorInfo;
        }
    }
//
    public function send_email_activate($array){
        $name = filter_var($array["name"], FILTER_SANITIZE_STRING);
        $lastname = filter_var($array["lastname"],FILTER_SANITIZE_STRING);
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $date = (string)date_format(new \DateTime(), 'Y-m-d');;
        $hash = md5($email.$date);

        if($name && $lastname && $email) {
            $body = "<br/>Здравствуйте, $name $lastname!<br/><br/>Вы успешно зарегистрировались на сайте www.commercetech.tk.<br/>
                Вам пришло это письмо для того, чтобы вы смогли подтвердить свой почтовый адрес (он необходим для
                восстановления доступа к Личному Кабинету в случае утраты пароля).<br/>
                 Для поддтверждения адреса Вам необходимо пройти по ссылке ниже<br/><br/>
                 <a href='www.commercetech.tk/Registration/activateEmail/$hash'>www.commercetech.tk</a>";

            require_once $_SERVER['DOCUMENT_ROOT'] . "/php-library/phpmailer/phpmailer/class.phpmailer.php";

            $mail = new \PHPMailer();
            $mail->IsSendmail();

            $mail->AddReplyTo("support@commercetech.tk", "First Last");
            $mail->SetFrom('support@commercetech.tk', 'First Last');

            $address = $email;
            $username = $name . " " . $lastname;

            $mail->AddAddress($address, $username);
            $mail->Subject = "Пожалуйста, подтвердите свой email";
            $mail->MsgHTML($body);

            if (!$mail->Send()) {
//                $message = "Произошла ошибка: " . $mail->ErrorInfo;
//
//                \Route::Error($message);
            }
        }else{
//            $message = "<h3>Вы ввели некорректные данные</h3>";
//
//            \Route::Error($message);
        }
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