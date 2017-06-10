<?php

//Class for product
class Product{

  //Atributes
  private $id;
  private $ref;
  private $brand;
  private $model;
  private $stock;
  private $description;
  private $dealer;
  private $price;
  private $dealerPrice;

  //Constructor
  public function __construct($id, $ref, $brand, $model, $stock, $description, $dealer, $price, $dealerPrice){
    $this->id = $id;
    $this->ref = $ref;
    $this->brand = $brand;
    $this->model = $model;
    $this->stock = $stock;
    $this->description = $description;
    $this->dealer = $dealer;
    $this->price = $price;
    $this->dealerPrice = $dealerPrice;
  }
  
  public function toArray(){
    
    $ret = [
      "id" => $this->id,
      "ref" => $this->ref,
      "brand" => $this->brand,
      "model" => $this->model,
      "stock" => $this->stock,
      "description" => $this->description,
      "dealer" => $this->dealer,
      "price" => $this->price,
      "dealerPrice" => $this->dealerPrice
      ];
    
    return $ret;
  }

  //Getters
  public function getId(){
    return $this->id;
  }

  public function getRef(){
    return $this->ref;
  }

  public function getBrand(){
    return $this->brand;
  }
  
  public function getModel(){
    return $this->model;
  }

  public function getStock(){
    return $this->stock;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getDealer(){
    return $this->dealer;
  }

  public function getPrice(){
    return $this->price;
  }

  public function getDealerPrice(){
    return $this->dealerPrice;
  }

  //Setters

  //public function setId($id){
  //  $this->id = $id;
  //}

  public function setRef($ref){
    $this->ref = $ref;
  }

  public function setBrand($brand){
    $this->brand = $brand;
  }
  
  public function setModel($model){
    $this->model = $model;
  }

  public function setStock($stock){
    $this->stock = $stock;
  }

  public function setDescription($description){
    $this->description = $description;
  }

  public function setDealer($dealer){
    $this->dealer = $dealer;
  }

  public function setPrice($price){
    $this->price = $price;
  }

  public function setDealerPrice($dealerPrice){
    $this->dealerPrice = $dealerPrice;
  }
}
