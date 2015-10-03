<?php

namespace Shop\Model;

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
        $salt1 = "q0r@m";
        $salt2 = "8r#h";
        $name = strip_tags($array["name"]);
        $lastname = strip_tags($array["lastname"]);
        $birthday = $array["birthday"];
        $email = strip_tags($array["email"]);
        $password1 = htmlentities($array["pass1"]);
        $password2 = htmlentities($array["pass2"]);
        $is_active = 0;
        $reg_date = (string)date_format(new \DateTime(), 'Y-m-d');
        $last_update = (string)date_format(new \DateTime(), 'Y-m-d');
        $is_delete = 0;
        if ($password1 !== $password2) {
            echo <<<HERE
            <div class='alarm'>
                <h3>Пароли не совпадают</h3>
                <a href='/Registration'><button>Попробовать ещё раз</button></a>
                <a href='/Main'><button>Вернуться на главную</button></a>
            </div>
HERE;
        } else {
            $password = md5($salt1 . $password1 . $salt2);

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
        $name = strip_tags($array["name"]);
        if (!$name) $name = null;
        $lastname = strip_tags($array["lastname"]);
        if (!$lastname) $lastname = null;
        $birthday = $array["birthday"];
        $date1 = strtotime($birthday);
        $date2 = (strtotime("0000-00-00"));
        if ($date1 == $date2) $birthday = null;
        $email = strip_tags($array["email"]);
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
        $mark = strip_tags($product["mark"]);
        $title = strip_tags($product["title"]);
        $description = htmlentities($product["description"]);
        $count = (int)$product["count"];
        $price = (int)$product['price'];

        $id_catalog = 1;
        foreach ($categories as $category) {
            if ($category['title'] === $product['id_catalog']) {
                $id_catalog = $category['id'];
                break;
            }
        }
        $link = htmlentities($product['link']);

        $product = \ORM::for_table("products")->find_one($product['id']);
        $product->set('title', $title);
        $product->set('mark', $mark);
        $product->set('count', $count);
        $product->set('price', $price);
        $product->set('description', $description);
        $product->set('id_catalog', $id_catalog);
        $product->set('link', $link);
        $product->save();
    }

//админ удаляет товар
    public function delete_Product($id)
    {
        $product = \ORM::for_table("products")->find_one($id);
        $product->delete();
    }

//админ добавляет товар
    public function add_Product($product, $categories)
    {
        $mark = strip_tags($product['mark']);
        $title = strip_tags($product['title']);
        $description = htmlentities($product['description']);
        $count = (int)$product['count'];
        $price = doubleval($product['price']);

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
        $product->save();
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

        $salt1 = "q0r@m";
        $salt2 = "8r#h";
        $newPass = self::generate_pass();
        $hashNewPass = md5($salt1.$newPass.$salt2);

        \ORM::for_table('users')->find_one($user['id'])
            ->set("password", $hashNewPass)
            ->save();

        $body = "<br/>Ваш новый пароль: <b>$newPass</b><br/><h3>Запомните Ваш новый пароль и удалите это письмо!</h3>";

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
    public function email_activate($array){
        $name = strip_tags($array["name"]);
        $lastname = strip_tags($array["lastname"]);
        $email = strip_tags($array["email"]);
        $date = new \DateTime();
        $date = (string)$date;
        $hash = md5($email.$date);

        $body = "<br/>Здравствуйте, $name $lastname!<br/><br/>Вы успешно зарегистрировались на сайте www.commercetech.tk.<br/>
                Вам пришло это письмо для того, чтобы вы смогли подтвердить свой почтовый адрес (он необходим для
                восстановления доступа к Личному Кабинету в случае утраты пароля).<br/>
                 Для поддтверждения адреса Вам необходимо пройти по ссылке ниже<br/><br/>
                 <a href='/Registration/activateEmail/$hash'>/Registration/activateEmail/$hash</a>";

        require_once $_SERVER['DOCUMENT_ROOT']."/php-library/phpmailer/phpmailer/class.phpmailer.php";

        $mail = new \PHPMailer();
        $mail->IsSendmail();

        $mail->AddReplyTo("support@commercetech.tk","First Last");
        $mail->SetFrom('support@commercetech.tk', 'First Last');

        $address = $email;
        $username = $name." ".$lastname;

        $mail->AddAddress($address, $username);
        $mail->Subject = "Пожалуйста, подтвердите свой email";
        $mail->MsgHTML($body);

        if(!$mail->Send()) {
            echo "Произошла ошибка: " . $mail->ErrorInfo;
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