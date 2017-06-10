<?php

require_once(__DIR__.'/../model/db/OrdersDb.php');
require_once(__DIR__.'/../model/db/ClientsDb.php');
require_once(__DIR__.'/../model/db/ProductsDb.php');

class OrderController{

  /**
   * param $products Espero un array amb IDs de productes
   */
  public function addOrder($totalPrice, $buyDate, $state, $clientId, $products){
    
    //Get the data from the client
    $cli = new ClientDb();
    
    $clientInfo = $cli->generateDetails($clientId);
    
    //Get the data from the products
    $pro = new ProductsDb();
    
    $prodArray = array();
    foreach($products as $p){
      $prodInfo = $pro->generateDetails($p);
      array_push($prodArray, $prodInfo);
    }
    
    //Put the data together for MongoDb
    $data = ['totalPrice'=> $totalPrice, 'buyDate'=> $buyDate, 'state'=> $state, 'client'=> 
      ['dni'=> $clientInfo->getDni(), 'name'=> $clientInfo->getName(), 'surname'=> $clientInfo->getSurname(), 'address'=> $clientInfo->getAddress(), 
      'city'=> $clientInfo->getCity, 'country'=> $clientInfo->getCountry(), 'phone'=> $clientInfo->getPhone(), 'email'=> $clientInfo->getMail()], 
      'products'=> [$prodArray]];
    
    $ord = new OrderDb();
    
    $stat = $ord->insertOrder($data);
    
    //If stat is 1, it's been completed
    return $stat;

  }

  public function getOrders(){
    
    $ord = new OrderDb();
    $orders = $ord->getOrders();
    
    return $orders;
    
  }
  
  public function getDetails($id){
    
    $ord = new OrderDb();
    $details = $ord->detailOrder($id);
    
    return $details;
    
  }
  
  public function deleteOrder($id){
    
    $ord = new OrderDb();
    $ret = $ord->deleteOrder($id);
    
    //If return 1, it's been deleted
    return $ret;
    
  }
  
  //Just be able to update the state of the order, nothing else !
  public function updateOrder($id, $state){
    
    $ord = new OrderDb();
    $ret = $ord->updateOrder($id, $state);
    
    //If return 1, it's been updated
    return $ret;
    
  }
  
}
