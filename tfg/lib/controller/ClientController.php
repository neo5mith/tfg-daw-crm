<?php
/**
 *Controller for the Client related functions
 * @require ClientsDb.php
 */

require_once(__DIR__.'/../model/db/ClientsDb.php');

/**
 * Client Controller Class
 */
class ClientController{

  /**
   * Adding a Client
   * @dni string
   * @name string
   * @surname string
   * @address string
   * @city string
   * @country string
   * @phone string
   * @mail string
   * @stat int - result of the operation
   */
  public function addClient($dni, $name, $surname, $address, $city, $country, $phone, $mail){

    $cli = new ClientsDb();
    $stat = $cli->createClient($dni, $name, $surname, $address, $city, $country, $phone, $mail);
    
    return $stat;
  }
  
  /**
   * Getting all the Clients of the DDBB
   * @clients array - All the clients array
   */
  public function getClients(){
    
    $cli = new ClientsDb();
    $clients = $cli->getDb();
    
    return $clients;
    
  }
  
  /**
   * Get the 10 last Client inserted on the DDBB
   * @clients array - Array of the last 10 Clients inserted
   */
  public function getLastClients(){
    
    $cli = new ClientsDb();
    $clients = $cli->getDbLast();
    
    return $clients;
    
  }
  
  /**
   * Given an ID, get all the Details of that Client
   * @id int
   * @details Object client with the details of the client
   */
  public function getDetails($id){
    
    $cli = new ClientsDb();
    $details = $cli->generateDetails($id);
    
    return $details;
    
  }
  
  /**
   * Given a DNI, get all the Details of that Client
   * @dni string
   * @detailsByDni Object client with the details of the client
   */
  public function getDetailsByDni($dni){
    
    $cli = new ClientsDb();
    $detailsByDni = $cli->generateDetailsByDni($dni);
    
    return $detailsByDni;
    
  }
  
  /**
   * Given an ID, the function deletes the corresponding Client
   * @id int
   */ 
  public function deleteClient($id){
    
    $cli = new ClientsDb();
    $cli->deleteClient($id);
    
  }
  
  /**
   *This function allows to update the info of the given ID Client
   * @id int
   * @dni string
   * @name string
   * @surname string
   * @address string
   * @city string
   * @country string
   * @phone string
   * @email string
   * @ret boolean - State of the operation, true for done
   */
  public function updateClient($id,$dni,$name,$surname,$address, $city, $country, $phone, $email){
    
    $cli = new ClientsDb();
    $ret = $cli->updateClient($id, $dni, $name, $surname, $address, $city, $country, $phone, $email);
    
    return $ret;
    
  }
  
}
