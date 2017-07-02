<?php
/**
 *Controller for the Order related functions
 * @require OrdersDb.php
 * @require ClientsDb.php
 * @require ProductsDb.php
 */

require_once(__DIR__.'/../model/db/OrdersDb.php');
require_once(__DIR__.'/../model/db/ClientsDb.php');
require_once(__DIR__.'/../model/db/ProductsDb.php');

/**
 * Order Controller Class
 */
class OrderController{
  
  /**
   * Given Client information, total price of the Order, products in the Order
   * and the units of each product, we add an Order to DDBB
   * @clientDni string
   * @totalPrice float
   * @products array of ID's (int)
   * @units array of Units (int)
   * @stat int - 1 is done
   */
  public function addOrder($clientDni, $totalPrice, $products, $units){
    
    //Get the data from the client
    $cli = new ClientsDb();
    $clientResult = $cli->generateDetailsByDni($clientDni);
    $clientInfo = $clientResult[0];
    
    //Get the data from the products
    $pro = new ProductDb();
    $prodArray = array();
    
    //Join the Product data with the units taken
    $prods = count($products);
    for($i = 0 ; $i < $prods ; $i++){
      $prodInfo = $pro->generateDetails($products[$i]);
      $testA = $prodInfo[0]->toArray();
      $testA['units'] = $units[$i];
      $testA['linePrice'] = $testA['price']*$testA['units'];
      array_push($prodArray, $testA);
    }
    
    //Put the data together for MongoDb
    $data = ['totalPrice'=> $totalPrice, 'buyDate'=> time(), 'status'=> "Order Generated", 
        'client'=> ['dni'=> $clientInfo->getDni(), 'name'=> $clientInfo->getName(), 
        'surname'=> $clientInfo->getSurname(), 'address'=> $clientInfo->getAddress(), 
        'city'=> $clientInfo->getCity(), 'country'=> $clientInfo->getCountry(), 
        'phone'=> $clientInfo->getPhone(), 'email'=> $clientInfo->getMail()], 
        'products'=> $prodArray];
    
    //Insert the data into MongoDB
    $ord = new OrdersDb();
    $stat = $ord->insertOrder($data);
    
    //Update the stock of the products into the MYSQL DDBB
    // $product;
    foreach ($prodArray as $product){
      $un = $product['units'];
      $currStock = $product['stock'];
      $newStock = $currStock - $un;
      $ProId = $product['id'];
      $pro->updateStock($ProId, $newStock);
    }
    
    return $stat;

  }
  
  /**
   * Get all the orders from MongoDB
   * @orders array of orders with its details
   */
  public function getOrders(){
    
    $ord = new OrdersDb();
    $orders = $ord->getOrders();
    
    return $orders;
    
  }
  
  /**
   * Get the orders with state equals to "Reserved"
   * @orders Array of the orders with reserved status
   */
  public function getReservedOrders(){
    
    $ord = new OrdersDb();
    $orders = $ord->getReservedOrders();
    
    return $orders;
    
  }
  
  /**
   * Get the orders with state equals to "Payed"
   * @orders Array of the orders with payed status
   */
  public function getPayedOrders(){
    
    $ord = new OrdersDb();
    $orders = $ord->getPayedOrders();
    
    return $orders;
    
  }
  
  /**
   * Get the details of an Specific Order, considering the ID
   * @id int
   * @details Object Order of the given ID
   */
  public function getDetails($id){
    
    $ord = new OrdersDb();
    $details = $ord->detailOrder($id);
    
    return $details;
    
  }
  
  /**
   * Delete an specific Order using ID
   * @id int
   * @ret int - If it's 1, it's been succesfully deleted
   */
  public function deleteOrder($id){
    
    $ord = new OrdersDb();
    $ret = $ord->deleteOrder($id);
    
    return $ret;
    
  }
  
  /**
   * Update the state of the Order, given the ID of the order and the Status to put
   * @id int
   * @state string
   * @ret int - If 1, it's been made
   */
  public function updateOrder($id, $state){
    
    $ord = new OrdersDb();
    $ret = $ord->updateOrder($id, $state);
    
    return $ret;
    
  }
}
