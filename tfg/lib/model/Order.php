<?php

//Class for order
class Order{

  //Atributes
  private $id;
  private $totalPrice;
  private $buyDate; //purchaseDate
  private $status;
  private $client;
  private $products;

  //Constructor
  public function __construct($id, $totalPrice, $buyDate, $status, $client, $products){
    $this->id = $id;
    $this->totalPrice = $totalPrice;
    $this->buyDate = $buyDate;
    $this->status = $status;
    $this->client = $client;
    $this->products = $products;
  }
  
  public function toArray(){
    
    $ret = [
      "id" => $this->id,
      "totalPrice" => $this->totalPrice,
      "buyDate" => $this->buyDate,
      "status" => $this->status,
      "client" => $this->client,
      "products" => $this->products
    ];
    
    return $ret;
  }

  //Getters
  public function getId(){
    return $this->id;
  }

  public function getTotalPrice(){
    return $this->totalPrice;
  }

  public function getBuyDate(){
    return $this->buyDate;
  }
  
  public function getState(){
    return $this->state;
  }

  public function getClient(){
    return $this->client;
  }

  public function getProducts(){
    return $this->products;
  }

  //Setters

  //public function setId($id){
  //  $this->id = $id;
  //}

  public function setTotalPrice($totalPrice){
    $this->totalPrice = $totalPrice;
  }

  public function setBuyDate($buyDate){
    $this->buyDate = $buyDate;
  }
  
  public function setState($state){
    $this->state = $state;
  }

  public function setClient($client){
    $this->client = $client;
  }

  public function setProducts($products){
    $this->products = $products;
  }

}
