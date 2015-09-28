<?php
//Контроллер для работы с каталогом
class Controller_Cabin extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->model = new Model_Cabin();
    }

    function action_index(){    
        $products = $this->model->get_all($_SESSION['user_id']);
        $this->view->generate('cabin_view.php', 'template_view.php',
            array(
                'title' => 'Моя корзина',
                'products' => $products,
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => false
            )
        );
    }

    function action_add($id) {
         $id = (int)$id[0];
        $user = $_SESSION['user_id'];
        $this->model->add($user, $id);
        $_SESSION['item_count'] = $this->model->get_count($_SESSION['user_id']);

        header("location: /Cabin");
    }

    function action_delete($id) {
        $id = (int)$id[0];
        $user = (int)$_SESSION['user_id'];

        $this->model->delete($id, $user);
        $_SESSION['item_count'] = $this->model->get_count($_SESSION['user_id']);

        header("location: /Cabin");
    }

    function action_order(){

        $this->view->generate('order.php', 'template_view.php',
            array(
                'title' => 'Оформление заказа',
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => false
            )
        );
    }

    function action_payment($user){

        $user = (int)$user[0];

        $this->model->order($user);

        $item_count = $_SESSION['post_array']['item_count'];

        for ($i=1; $i <= $item_count ; $i++) { 

            $id_product = $_SESSION['post_array']["id_".$i];
            $price = $_SESSION['post_array']["price_".$i];
            $count = $_SESSION['post_array']["quantity_".$id_product];
            
            $this->model->order_property($id_product, $price, $count);
        }

        $this->model->empty_cart($user);

        $_SESSION['item_count'] = $this->model->get_count($_SESSION['user_id']);

        $messageToAdmin = "<h1>Новый заказ</h1><div>Вы получили новый заказ от пользователя с емайлом - " . $_SESSION['login'] . ". Описание заказа:</div>";
                        
        for ($i=1; $i <= $item_count; $i++) 
                
        {$messageToAdmin = $messageToAdmin . "Код продукта: " . $_SESSION["post_array"]["id_".$i] . "<br>Количество: " . $_SESSION["post_array"]["quantity_".$id_product] . "<br>Цена: " . $_SESSION["post_array"]["price_".$i];}
        
        $messageToUser = "<h1>Ваш заказ принят</h1><div>Ваш заказ принят. Номер Вашего заказа: " . $_SESSION['post_array']['order_number'] . ". Описание заказа:</div>";
                        
        for ($i=1; $i <= $item_count; $i++) 

        {$messageToUser = $messageToUser . "Код продукта: " . $_SESSION["post_array"]["id_".$i] . "<br>Количество: " . $_SESSION["post_array"]["quantity_".$id_product] . "<br>Цена: " . $_SESSION["post_array"]["price_".$i];}

        $this->model->send_mail($user, $messageToAdmin, $messageToUser);

        $this->view->generate('payment.php', 'template_view.php',
            array(
                'title' => '',
                'is_photo_slider' => false,
                'm1' => $messageToAdmin,
                'm2' => $messageToUser,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );

    }

            
}