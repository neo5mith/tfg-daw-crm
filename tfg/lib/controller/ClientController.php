<?php

require_once(__DIR__.'/../model/db/ClientsDb.php');

class ClientController{

  public function addClient($dni, $name, $surname, $address, $city, $country, $phone, $mail){

    $cli = new ClientDb();
    $stat = $cli->createClient($dni, $name, $surname, $address, $city, $country, $phone, $mail);
    
    return $stat;

  }

  public function getClients(){
    
    $cli = new ClientDb();
    $clients = $cli->getDb();
    
    return $clients;
    
  }
  
  //Get the 10 last clients
  public function getLastClients(){
    
    $cli = new ClientDb();
    $clients = $cli->getDbLast();
    
    return $clients;
    
  }
  
  public function getDetails($id){
    
    $cli = new ClientDb();
    $details = $cli->generateDetails($id);
    
    return $details;
    
  }
  
  public function getDetailsByDni($dni){
    
    $cli = new ClientDb();
    $detailsByDni = $cli->generateDetailsByDni($dni);
    
    return $detailsByDni;
    
  }
  
  public function deleteClient($id){
    
    $cli = new ClientDb();
    $cli->deleteClient($id);
    
  }
  
  public function updateClient($id,$dni,$name,$surname,$address, $city, $country, $phone, $email){
    
    $cli = new ClientDb();
    $ret = $cli->updateClient($id, $dni, $name, $surname, $address, $city, $country, $phone, $email);
    
    return $ret;
    
  }
  
}
