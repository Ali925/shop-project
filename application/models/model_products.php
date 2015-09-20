<?php

class Model_Products extends Model{

    public function get_data(){

        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, categories.title as category_name
                FROM products
                LEFT JOIN categories ON products.id_catalog = categories.id";

        $result = $this->_pdo->prepare($sql);
        $result->execute();
        // if(!$result){
        //     return $result;
        // }
        $records = array();
        for ($i=0; $i < $result->rowCount(); $i++) { 
            $records[$i] = $result->fetch(PDO::FETCH_ASSOC);
        }
        return $records;

    }

    public function get_product($id){
        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, products.count, categories.title as category_name
                FROM products
                LEFT JOIN categories ON products.id_catalog = categories.id WHERE products.id = :id";

        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $records;

    }


}