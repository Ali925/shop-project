<?php

class Model_shop extends Model{

//Получаем данные пользователя
    public function get_userData($id){
        $sql = "SELECT name, lastname, birthday, email, reg_date, is_active
                FROM users
                WHERE users.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;
    }

//Полученаем все заказы пользователя
    public function get_orders($id){
        $sql = "SELECT orders.id, orders.date_order, orders.status,
				products.mark, products.title, products.description,
				products.price, order_property.count, order_property.price
                FROM orders
                LEFT JOIN order_property ON orders.id = order_property.id_order
                LEFT JOIN products on order_property.id_product = products.id
                WHERE orders.id_user = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;
    }

//Получаем конкретный заказ пользователя
    public function get_order($id, $order_id){
        $sql = "SELECT 	orders.date_order, orders.status,
				products.mark, products.title, products.description,
				products.price, order_property.count, order_property.price
                FROM orders
                LEFT JOIN order_property ON orders.id = order_property.id_order
                LEFT JOIN products on order_property.id_product = products.id
                WHERE orders.id_user = :id AND orders.id = :order_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;
    }
//получаем все товары
    public function get_products(){
        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, categories.title as category
                FROM products
                LEFT JOIN categories ON products.id_catalog = categories.id";

        $result = $this->pdo->query($sql);

        if(!$result){
            return $result;
        }
        $records = $result->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
//получаем товары одной категории
    public function get_category($category){
        $sql = "SELECT products.id, products.title, products.price, products.mark, products.description
                FROM products
                LEFT JOIN categories ON products.id_catalog = categories.id
                WHERE categories.title = :category";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;
    }
//получаем конкретный товар
    public function get_item($id){
        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, categories.title as category
                FROM products
                LEFT JOIN categories ON products.id_catalog = categories.id WHERE products.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;
    }
}