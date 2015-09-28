<?php

class Model_Cabin extends Model

{   
        protected $table= "users";

		public function add($user, $id) {
            $product = \ORM::for_table('cart')->create();
            $product->id_user = $user;
            $product->id_product = $id;
            $product->save();

            $count = \ORM::for_table('products')->find_one($id);
            $c = $count['count']-1;
            $count->set('count', $c);
            $count->save();
        }

        public function delete($id, $user) {
            $product = \ORM::for_table('cart')
                    ->where(array(
                        'id_user' => $user,
                        'id_product' => $id
                        ))
                    ->find_one();

            $product->delete();

            $count = \ORM::for_table('products')->find_one($id);
            $c = $count['count']+1;
            $count->set('count', $c);
            $count->save();
        }

        public function get_all($user) {

            return \ORM::for_table('cart')
                ->select_many(array('cart_id' => 'cart.id'), 'cart.id_user', "products.link", "products.id", "products.title", "products.mark", "products.description", "products.price", "products.count")
                ->join('products', array('cart.id_product', '=', 'products.id'))
                ->where('cart.id_user', $user)
                ->find_many();
        }

        public function get_count($user) {

            return \ORM::for_table('cart')->where("id_user", $user)->count();

       }

       public function order($user) {

            $order = \ORM::for_table('orders')->create();
            $order->id_user = $user;
            $order->status = "В обработке";
            $order->date_order = date("Y-m-d H:i:s");
            $order->save();
       }

       public function order_property($id_product, $price, $count) {

            $max = \ORM::for_table('orders')->max('id');
            $_SESSION['post_array']['order_number'] = $max;
            $order_property = \ORM::for_table('order_property')->create();
            $order_property->id_order = $max;
            $order_property->id_product = $id_product;
            $order_property->price = $price;
            $order_property->count = $count;
            $order_property->save();
       }

       public function empty_cart($user){

             return \ORM::for_table('cart')
                ->where_equal('id_user', $user)
                ->delete_many();
       }

       public function send_mail($user, $messageToAdmin, $messageToUser){

            $user_data = \ORM::for_table('users')->find_one($user);

            $mailAdmin = new PHPMailer();

            $mailAdmin->CharSet = 'utf-8';

            $mailAdmin->IsSendmail();

            $mailAdmin->SetFrom('admin@e-commerce.com', 'e-commerce');

            $mailAdmin->AddAddress("alitural.mehdi@gmail.com", "Tural Mehdi");

            $mailAdmin->Subject = "Новый заказ";

            $mailAdmin->MsgHTML($messageToAdmin);

            $mailAdmin->Send();

            $mailUser = new PHPMailer();

            $mailUser->CharSet = 'utf-8';

            $mailUser->IsSendmail();

            $mailUser->SetFrom('admin@e-commerce.com', 'e-commerce');

            $mailUser->AddAddress($user_data['email'], $user_data['name'] . ' ' . $user_data['lastname']);

            $mailUser->Subject = "Ваш заказ принят";

            $mailUser->MsgHTML($messageToUser);

            $mailUser->Send();

       }

	
}

?>