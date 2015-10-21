<?php

class Model_Admin extends Model{

	public function get_auth_ad($name){
        return \ORM::for_table("admins")
            ->where("name", $name)
            ->find_one();
    }

    //админ добавляет категорию
    public function add_Category($title){
        $category = \ORM::for_table("categories")->create();
        $category->set('title', $title);
        $category->save();
    }
	//админ удаляет категорию
    public function delete_Category($id){
        $category = \ORM::for_table("categories")->find_one($id);
        $category->delete();
    }
	//админ изменяет категорию
	public function edit_Category($id, $title){
        $category = \ORM::for_table("categories")->find_one($id);
        $category->set('title', $title);
        $category->save();
	}
    //админ меняет статус заказа
    public function edit_Order($array)
    {
        $order = \ORM::for_table("orders")->find_one($array['id']);
        $order->set('status', $array['status']);
        $order->save();
    }

    //админ редактирует товар
    public function edit_Product($product, $categories){
        $mark = strip_tags($product["mark"]);
        $title = strip_tags($product["title"]);
        $description = htmlentities($product["description"]);
        $count = (int)$product["count"];
        $price = (int)$product['price'];
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
    public function add_Product($product, $categories){
        if(!is_array($categories)){
          $ctgrs = \ORM::for_table("categories")->where('title', $categories)->find_one();
        }
        $mark = strip_tags($product['mark']);
        $title = strip_tags($product['title']);
        $description = htmlentities($product['description']);
        $count = (int)$product['count'];
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
        if(is_array($categories)){
            foreach($categories as $category){
                if($category['title'] === $product['id_catalog']){
                    $id_catalog = $category['id'];
                    break;
                }
            } 
        }

        else {
            $id_catalog = $ctgrs['id'];
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
                // $message = "<h3>Вы ввели некорректные данные</h3>";

//            \Route::Error($message);
         }
     }

    public function get_emails($key){
        if($key == 1){
            return \ORM::for_table('admins')->find_many();
        }
        elseif($key == 2){
            return \ORM::for_table("users")
            ->distinct()
            ->select_many('users.email', 'users.name', 'users.lastname')
            ->join("orders", array("users.id","=", "orders.id_user"))
            ->where_not_equal('is_delete', '1')
            ->find_many();
        }
        elseif ($key == 3) {
            return \ORM::for_table('users')->where_not_equal('is_delete', '1')->find_many();
        }
        elseif ($key == 4) {
            $time = date("Y-m-d H:i:s", strtotime('-3 months')); 
            return \ORM::for_table('users')->where_gte('reg_date', $time)->where_not_equal('is_delete', '1')->find_many();
        }
        elseif ($key == 5) {
            return \ORM::for_table('users')->where('is_active', '0')->where_not_equal('is_delete', '1')->find_many();
        }
    }

}

?>