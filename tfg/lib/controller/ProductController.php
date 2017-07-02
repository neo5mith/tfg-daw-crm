<?php
/**
 *Controller for the Produc related functions
 * @require ProductsDb.php
 */

require_once(__DIR__.'/../model/db/ProductsDb.php');

/**
 * Product Controller Class
 */
class ProductController{
  
  /**
   * Given the info of the Product, this Product data will be inserted and created into the DDBB
   * @ref int
   * @brand string
   * @model string
   * @stock int
   * @description string
   * @dealer string
   * @price float
   * @dealerPrice float
   * @stat boolean - True if correct
   */
  public function addProduct($ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice){

    $prod = new ProductDb();
    $stat = $prod->createProduct($ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice);
    
    return $stat;

  }
  
  /**
   * Get all the Products from the DDBB
   * @products array of Product objects
   */
  public function getProducts(){
    
    $prod = new ProductDb();
    $products = $prod->getDb();
    
    return $products;
    
  }
  
  /**
   * Get the 10 last Products
   * @products array with Product Objects
   */
  public function getLastProducts(){
    
    $pro = new ProductDb();
    $products = $pro->getDbLast();
    
    return $products;
    
  }
  
  /**
   * Get the details of a concrete Product, given by the ID
   * @id int
   * @details Product object with the details of the Product chosen
   */
  public function getDetails($id){
    
    $prod = new ProductDb();
    $details = $prod->generateDetails($id);
    
    return $details;
    
  }
  
  /**
   * Get the details of a Product, by the reference of it
   * @ref int
   * @details Product object with the details of it
   */
  public function getDetailsByRef($ref){
    
    $prod = new ProductDb();
    $details = $prod->generateDetailsByRef($ref);
    
    return $details;
    
  }
  
  /**
   * Delete a Product based on it's ID
   * @id int
   */
  public function deleteProduct($id){
    
    $prod = new ProductDb();
    $prod->deleteProduct($id);
    
  }
  
  /**
   * Update the Product information with the new data passed
   * @id int
   * @ref int
   * @brand string
   * @model string
   * @stock int
   * @description string
   * @dealer string
   * @price float
   * @dealerPrice float
   * @ret boolean - True if complete
   */
  public function updateProduct($id,$ref,$brand,$model,$stock,$description, $dealer, $price, $dealerPrice){
    
    $prod = new ProductDb();
    $ret = $prod->updateProduct($id, $ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice);
    
    return $ret;
    
  }
  
  /**
   * Get all the Products which it's stock is 50 or lower
   * @ret Array with Product objects
   */
  public function alarmStock(){
    
    $prod = new ProductDb();
    $ret = $prod->getProductsUnderStock();
    
    return $ret;
    
  }
}