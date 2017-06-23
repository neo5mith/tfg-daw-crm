<?php

require_once(__DIR__.'/../model/db/ProductsDb.php');

class ProductController{

  public function addProduct($ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice){

    $prod = new ProductDb();
    $stat = $prod->createProduct($ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice);
    
    return $stat;

  }

  public function getProducts(){
    $prod = new ProductDb();
    $products = $prod->getDb();
    
    return $products;
    
  }
  
  //Get the 10 last Products
  public function getLastProducts(){
    
    $pro = new ProductDb();
    $products = $pro->getDbLast();
    
    return $products;
    
  }
  
  public function getDetails($id){
    
    $prod = new ProductDb();
    $details = $prod->generateDetails($id);
    
    return $details;
    
  }
  
  public function getDetailsByRef($ref){
    
    $prod = new ProductDb();
    $details = $prod->generateDetailsByRef($ref);
    
    return $details;
    
  }
  
  public function deleteProduct($id){
    
    $prod = new ProductDb();
    $prod->deleteProduct($id);
    
  }
  
  public function updateProduct($id,$ref,$brand,$model,$stock,$description, $dealer, $price, $dealerPrice){
    
    $prod = new ProductDb();
    $ret = $prod->updateProduct($id, $ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice);
    
    return $ret;
    
  }
  
  public function alarmStock(){
    
    $prod = new ProductDb();
    $ret = $prod->getProductsUnderStock();
    
    return $ret;
    
  }
  
}
