<?php

require_once(__DIR__.'/../model/db/OrdersDb.php');
require_once(__DIR__.'/../model/db/ClientsDb.php');
require_once(__DIR__.'/../model/db/ProductsDb.php');

class OrderController{

  /**
   * param $products Espero un array amb IDs de productes
   */
  public function addOrder($totalPrice, $clientDni, $products){
    
    //Get the data from the client
    $cli = new ClientsDb();
    
    $clientInfo = $cli->generateDetailsByDni($clientDni);
    
    //Get the data from the products
    $pro = new ProductsDb();
    
    $prodArray = array();
    foreach($products as $p){
      $prodInfo = $pro->generateDetails($p);
      array_push($prodArray, $prodInfo);
    }
    
    //Put the data together for MongoDb
    $data = ['totalPrice'=> $totalPrice, 'buyDate'=> new Date(), 'status'=> "Order Generate", 
        'client'=> ['dni'=> $clientInfo->getDni(), 'name'=> $clientInfo->getName(), 
        'surname'=> $clientInfo->getSurname(), 'address'=> $clientInfo->getAddress(), 
        'city'=> $clientInfo->getCity, 'country'=> $clientInfo->getCountry(), 
        'phone'=> $clientInfo->getPhone(), 'email'=> $clientInfo->getMail()], 
        'products'=> $prodArray];
    
    $ord = new OrdersDb();
    
    $stat = $ord->insertOrder($data);
    
    //If stat is 1, it's been completed
    return $stat;

  }

  public function getOrders(){
    
    $ord = new OrdersDb();
    $orders = $ord->getOrders();
    
    return $orders;
    
  }
  
  public function getDetails($id){
    
    $ord = new OrdersDb();
    $details = $ord->detailOrder($id);
    
    return $details;
    
  }
  
  public function deleteOrder($id){
    
    $ord = new OrdersDb();
    $ret = $ord->deleteOrder($id);
    
    //If return 1, it's been deleted
    return $ret;
    
  }
  
  //Just be able to update the state of the order, nothing else !
  public function updateOrder($id, $state){
    
    $ord = new OrdersDb();
    $ret = $ord->updateOrder($id, $state);
    
    //If return 1, it's been updated
    return $ret;
    
  }
  
}
