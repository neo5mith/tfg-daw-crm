<?php
/**
 *Model for the Order DDBB functions
 * @require Order.php
 */

require_once(__DIR__.'/../Order.php');

/**
 * Orders DB Model Class
 */
class OrdersDb{
  
  //Global atribute for the class
  private $collection;
  
  /**
   * Open the connection with MongoDB
   */
	private function openDatabaseConnection(){
    $this->collection = (new MongoDB\Client)->tfg->orders;
	}

  /**
   * Insert the data on the Order DDBB
   * @data Associative array, with the totalPrice, buyDate, status, client, products
   * @status int - 1 for completed
   */
  public function insertOrder($data){
    $this->openDatabaseConnection();
    $this->collection->insertOne($data);
    $status = "1";
    return $status;
  }
  
  /**
   * Update the state of an Order, given an ID
   * @id int
   * @state string
   * return int - 1 for done
   */
  public function updateOrder($id,$state){
    
    $this->openDatabaseConnection();
    
    $result = $this->collection->updateOne(['_id' =>(new MongoDB\BSON\ObjectID($id))],['$set' => ['status' => $state]]);
    
    return 1;
  }
  
  /**
   * Get all the Orders from MongoDB
   * @return Array with Order objects
   */
  public function getOrders(){
    $this->openDatabaseConnection();
		$res = $this->collection->find();
		$return = [];
		foreach($res as $row){
		  array_push($return, new Order($row["_id"]->__toString(),$row["totalPrice"],$row["buyDate"],$row["status"],$row["client"],$row["products"]));
		}
		return $return;
  }
  
  /**
   * Get the Orders which status is "Reserved"
   * @return Array with Order objects
   */
  public function getReservedOrders(){
    $this->openDatabaseConnection();
		$res = $this->collection->find(["status" => "Reserved"]);
		$return = [];
		foreach($res as $row){
		  array_push($return, new Order($row["_id"]->__toString(),$row["totalPrice"],$row["buyDate"],$row["status"],$row["client"],$row["products"]));
		}
		return $return;
  }
  
  /**
   * Delete an order, given it's ID
   * return int - 1 when done
   * NOT NEEDED, ORDERS MUST BE ALWAYS
   */
  // public function deleteOrder($id){
  //   $this->openDatabaseConnection();
	//   $this->collection->deleteOne(["_id" =>(new MongoDB\BSON\ObjectID($id))]);
  //   return 1;
  // }

  /**
   * Get the details of an Order, given the ID
   * @id int
   * @return Object Order
   */
  public function detailOrder($id){
    $this->openDatabaseConnection();
		$res = $this->collection->findOne(["_id" =>(new MongoDB\BSON\ObjectID($id))]);
		$return = new Order($res["_id"]->__toString(),$res["totalPrice"],$res["buyDate"],$res["status"],$res["client"],$res["products"]);
		return $return;
  }
  
}