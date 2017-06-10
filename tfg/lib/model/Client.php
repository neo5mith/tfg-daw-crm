<?php

//Class for client
class Client{

  //Atributes
  private $id;
  private $dni;
  private $name;
  private $surname;
  private $address;
  private $city;
  private $country;
  private $phone;
  private $mail;

  //Constructor
  public function __construct($id, $dni, $name, $surname, $address, $city, $country, $phone, $mail){
    $this->id = $id;
    $this->dni = $dni;
    $this->name = $name;
    $this->surname = $surname;
    $this->address = $address;
    $this->city = $city;
    $this->country = $country;
    $this->phone = $phone;
    $this->mail = $mail;
  }
  
  public function toArray(){
    
    $ret = [
      "id" => $this->id,
      "dni" => $this->dni,
      "name" => $this->name,
      "surname" => $this->surname,
      "address" => $this->address,
      "city" => $this->city,
      "country" => $this->country,
      "phone" => $this->phone,
      "mail" => $this->mail
      ];
    
    return $ret;
  }

  //Getters
  public function getId(){
    return $this->id;
  }

  public function getDni(){
    return $this->dni;
  }

  public function getName(){
    return $this->name;
  }

  public function getSurname(){
    return $this->surname;
  }

  public function getAddress(){
    return $this->address;
  }

  public function getCity(){
    return $this->city;
  }

  public function getCountry(){
    return $this->country;
  }

  public function getPhone(){
    return $this->phone;
  }

  public function getMail(){
    return $this->mail;
  }

  //Setters

  //public function setId($id){
  //  $this->id = $id;
  //}

  public function setDni($dni){
    $this->dni = $dni;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function setSurname($surname){
    $this->surname = $surname;
  }

  public function setAddress($address){
    $this->address = $address;
  }

  public function setCity($city){
    $this->city = $city;
  }

  public function setCountry($country){
    $this->country = $country;
  }

  public function setPhone($phone){
    $this->phone = $phone;
  }

  public function setMail($mail){
    $this->mail = $mail;
  }
}
