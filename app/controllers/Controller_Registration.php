<?php
//Контроллер для страницы регистрации
class Controller_Registration extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Shop\Model\Users();
    }

    function action_index(){
        $this->view->generate("View_Registration.php", "View_Template.php",
            array(
                "title" => "Регистрация нового пользователя",
                "formReg" => true,
                "success" => false
            )
        );
    }

    public function action_registration($array){
        $this->model->reg_user($array);

        $this->model->send_email_activate($array);

        header("location: /Registration/success");
    }

    public function action_success(){
        $this->view->generate("View_Registration.php", "View_Template.php",
            array(
                "formReg" => false,
                "success" => true
            )
        );
    }

    public function action_activateEmail($hash){
        if($_SESSION['type'] == "user"){
            $user = $this->model->get_user($_SESSION['id']);
            if((int)$user['is_active'] == 0){
                $email = $user['email'];
                $date = $user['reg_date'];
                $security = md5($email.$date);
                if($security == $hash){
                    \ORM::for_table('users')->find_one($user['id'])->set('is_active', 1)->save();

                    echo "<h3>Почтовый адрес успешно подтверждён!</h3>";
                }else{
                    echo "<h3>Почтовый адрес не подтверждён, обратитесь в техподдержку!</h3>";
                }
            }else{
                header('location: /');
            }
        }elseif($_SESSION['type'] != "admin" && $_SESSION['type'] != "user"){
            echo "<h3>Для подтверждения почтового ящика, Вам необходимо <a href='/Authorization'>авторизоваться</a></h3>";

        }
    }
}