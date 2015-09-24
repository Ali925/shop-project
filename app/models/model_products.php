<?php

class Model_Products extends Model{

    protected $table="products";

    public function get_data(){

        return \ORM::for_table($this->table)->find_many();
    }

    public function get_product($id){

        return \ORM::for_table($this->table)
            ->select_many(array('category' => 'categories.title'), "products.is_added", "products.id", "products.title", "products.mark", "products.description", "products.price", "products.count")
            ->join('categories', array('products.id_catalog', '=', 'categories.id'))
            ->find_one($id);
    }

    public function get_category($category){
        return \ORM::for_table("products")
            ->select_many("products.id", "products.title", "products.mark", "products.description", "products.price")
            ->join("categories", array("products.id_catalog","=", "categories.id"))
            ->where("categories.title", "=", $category)
            ->find_many();
    }


}