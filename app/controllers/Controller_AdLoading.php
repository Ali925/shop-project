<?php
include_once "app/models/model_products.php";
include_once "app/models/model_admin.php";

class Controller_AdLoading extends Controller{
    public function __construct(){
        parent::__construct();
        $this->modelProducts = new Model_Products;
        $this->modelAdmin = new Model_Admin;   
    }

	public function action_index(){
	$data = $this->modelProducts->get_xmldata();
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;

    $shop = $dom->createElement('shop');
    $dom->appendChild($shop);

    $choosenTable = $dom->createElement("products");
    $shop->appendChild($choosenTable);
    foreach($data as $product) {
         $item = $dom->createElement("product");
   
    
     $attr_id = $dom->createAttribute('id');

    
         $attr_id->value = $product['id'];
    

     $item->appendChild($attr_id);

    
            
     $item_row  =  $dom->createElement('title', $product['title']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('mark', $product['mark']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('count', $product['count']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('price', $product['price']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('description', $product['description']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('category', $product['category']);
     $item->appendChild($item_row);
     $item_row  =  $dom->createElement('image', $product['link']);
     $item->appendChild($item_row);
     
    $choosenTable->appendChild($item);

}
	$dom->save('XMLdata/data.xml');
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename("products.xml").'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('XMLdata/data.xml'));

    readfile('XMLdata/data.xml');

	}

	public function action_upload(){

		if(isset($_FILES['file'])){
			$products = array(array());
			$i = 0;
			$data = simplexml_load_file($_FILES["file"]["tmp_name"]);
			foreach ($data as $key => $value) {
				if($key == 'title'){
					$i++;
				}
				$products[$i][$key] = $value;
			}
			for ($k=1; $k <= $i; $k++) { 
				$this->modelAdmin->add_Product($products[$k], $products[$k]['category']);
			}
		}

		$this->view->generate("adloading_view.php", "adtemp_view.php",
            array(
                'title' => 'Выгрузка товаров',
                'msg' => $i
            )
        );

	}
		
}	
   