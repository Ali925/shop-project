<?php

include_once "app/models/model_products.php";

class Controller_Search extends Controller {


		
	public function __construct(){

        parent::__construct();
        $this->model = new Model_Products;
    }	

    public function action_index() {

    	$data = $this->model->get_data();
    	$titles = array();
    	$items_id = array();
    	$found_id = array();
    	$found_data = '';
    	foreach ($data as $item) {
    		array_push($titles, strtolower($item['title']));
    		array_push($items_id, $item['id']);
    	}

    	$query = strtolower(trim($_POST['search']));
    	
    	for($i=0, $count = count($titles);$i<$count;$i++){
    		if(strpos($titles[$i], $query)){
    			array_push($found_id, $items_id[$i]);
    		}
    	}
		if(!empty($found_id)){
    	$found_data = $this->model->get_found($found_id); }

    	$this->view->generate('products/list_view.php', 'template_view.php',
            array(
                'title' => 'Результаты поиска',
                'products' => $found_data,
                'is_search' => true,
                 'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );

    }

    public function action_wide() {

    	$categories = $this->model->get_categories();
    	
    	$this->view->generate('search_view.php', 'template_view.php',
            array(
                'title' => 'Расширенный поиск',
                'categories' => $categories,
                 'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
    }
    	

      public function action_result() {

    		if($_POST['min'] && !$_POST['max']){
    			$data = $this->model->get_wide_found($_POST['category'], $_POST['mark'], $_POST['min'], NULL);
    		}

    		elseif(!$_POST['min'] && $_POST['max']){
    			$data = $this->model->get_wide_found($_POST['category'], $_POST['mark'], NULL, $_POST['max']);
    		}

    		elseif($_POST['min'] && $_POST['max']){
    			$data = $this->model->get_wide_found($_POST['category'], $_POST['mark'], $_POST['min'], $_POST['max']);
    		}

    		else {
    			$data = $this->model->get_wide_found($_POST['category'], $_POST['mark'], NULL, NULL);
    		}

    		$this->view->generate('products/list_view.php', 'template_view.php',
            array(
                'title' => 'Результаты поиска',
                'products' => $data,
                'is_search' => true,
                 'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
    }


    public function action_ajax($id) {
    	header('Content-Type: application/json');

    	$id = (int)$id[0];
    	$marks = $this->model->get_products_mark($id);
    	$data = array();

    	foreach ($marks as $mark) {
    		array_push($data, $mark['mark']);
    	}

    	echo json_encode($data);
    }



}

?>