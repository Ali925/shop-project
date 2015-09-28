<?php

class Model_Products extends Model{

    protected $table="products";

    public function get_data(){

        return \ORM::for_table($this->table)->find_many();
    }

    public function get_incart($user) {
        return \ORM::for_table('cart')->where("id_user", $user)->find_many();
    }

    public function get_product($id){

        return \ORM::for_table($this->table)
            ->select_many(array('category' => 'categories.title'), "products.link", "products.id", "products.title", "products.mark", "products.description", "products.price", "products.count")
            ->join('categories', array('products.id_catalog', '=', 'categories.id'))
            ->find_one($id);
    }

    public function get_category($category){
        return \ORM::for_table("products")
            ->select_many(array('category' => 'categories.title'), "products.link", "products.id", "products.title", "products.mark", "products.description", "products.price", "products.count")
            ->join("categories", array("products.id_catalog","=", "categories.id"))
            ->where("products.id_catalog", $category)
            ->find_many();


    }

    public function get_categories(){
        return \ORM::for_table("categories")->find_many();
    }

    public function get_found($array) {
        return \ORM::for_table("products")->where_in('id', $array)->find_many();
    }

    public function get_products_mark($id) {
        return \ORM::for_table("products")->distinct()->select('mark')->where('id_catalog', $id)->find_many();
    }

    public function get_wide_found($category, $mark, $min, $max){

        if($min == NULL && $max == NULL){
            
            if($mark != ' '){
            return \ORM::for_table("products")
                ->where(array(
                    'id_catalog' => $category,
                    'mark' => $mark
                    ))
                ->find_many();
            }

            else {
                return \ORM::for_table("products")
                ->where('id_catalog', $category)
                ->find_many();
            }

        }

        elseif($max == NULL) {
            if($mark != ' '){
            return \ORM::for_table("products")
                ->where(array(
                    'id_catalog' => $category,
                    'mark' => $mark
                    ))
                ->where_gte('price', $min)
                ->find_many();
            }
            else {
                return \ORM::for_table("products")
                ->where('id_catalog', $category)
                ->where_gte('price', $min)
                ->find_many();
            }
        }

        elseif($min == NULL){
            if($mark != ' '){
            return \ORM::for_table("products")
                ->where(array(
                    'id_catalog' => $category,
                    'mark' => $mark
                    ))
                ->where_lte('price', $max)
                ->find_many();
            }
            else{
                return \ORM::for_table("products")
                ->where('id_catalog', $category)
                ->where_lte('price', $max)
                ->find_many();
            }
        }

        elseif ($min && $max) {
            if($mark != ' '){
            return \ORM::for_table("products")
                ->where(array(
                    'id_catalog' => $category,
                    'mark' => $mark
                    ))
                ->where_lte('price', $max)
                ->where_gte('price', $min)
                ->find_many();
            }
            else{
                return \ORM::for_table("products")
                ->where('id_catalog', $category)
                ->where_lte('price', $max)
                ->where_gte('price', $min)
                ->find_many();
            }
        }

    }


}