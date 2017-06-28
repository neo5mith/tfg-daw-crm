<?php

require_once(__DIR__.'/../Order.php');

class OrdersDb{

  private $collection;

	private function openDatabaseConnection(){
    $this->collection = (new MongoDB\Client)->tfg->orders;
	}

  public function insertOrder($data){
    $this->openDatabaseConnection();
    $this->collection->insertOne($data);
    $status = "1";
    return $status;
  }

  public function updateOrder($id,$state){
    $this->collection->updateOne(["_id" =>(new MongoDB\BSON\ObjectID($id))],['$state' => $state]);
    return 1;
  }

  public function getOrders(){
    $this->openDatabaseConnection();
		$res = $this->collection->find();
		$return = [];
		foreach($res as $row){
		  array_push($return, new Order($row["_id"]->__toString(),$row["totalPrice"],$row["buyDate"],$row["status"],$row["client"],$row["products"]));
		}
		return $return;
  }

  // public function deleteOrder($id){
  //   $this->openDatabaseConnection();
	//   $this->collection->deleteOne(["_id" =>(new MongoDB\BSON\ObjectID($id))]);
  //   return 1;
  // }

  public function detailOrder($id){
    $this->openDatabaseConnection();
		$res = $this->collection->findOne(["_id" =>(new MongoDB\BSON\ObjectID($id))]);
		return $res;
  }
  
}