<?php
namespace aitsydney; // namespace of the class has to be the same
use aitsydney\Database;

class Product extends Database{
    public function __construct(){
        //instantiate the database
        parent::__construct();
    }
    public function getProducts(){
        //query variable
        $query = "SELECT  
        product.product_id,
        product.name,
        product.description,
        product.price,
        image.image_file_name AS image
        FROM product 
        INNER JOIN product_image ON product.product_id = product_image.product_id
        INNER JOIN image ON product_image.image_id = image.image_id";
        //variable to use to connect the class to the database
        $statement = $this -> connection -> prepare ($query);

        //execute the query
        if ($statement -> execute()){
            $result = $statement -> get_result();
            $product_array = array();       //make product as array
            while($row = $result -> fetch_assoc()) {
                array_push($product_array, $row);
            }
            return $product_array;  
        }
    }
}




?>