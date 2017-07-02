<?php
/**
 *Model for the Client DDBB functions
 * @require Client.php
 */
 
require_once(__DIR__.'/../Client.php');

/**
 * Clients DB Model Class
 */
class ClientsDb{

  /**
   * Method where the connection to the MYSQL DDBB is created
   * @conn returns the open connection to the DDBB
   */
  public function createConnection(){
    $servername = "localhost";
    $username = "usuari";
    $password = "contra.s&enyaS3gur4";
    $dbname = "tfg";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
    
  }
  
  /**
   * Get all the Clients from the DDBB
   * @ret array of Client objects
   */
  public function getDb(){
    $conn = $this->createConnection();

    $ret[0] = null;
    
    //Ask the DDBB for all the Clients and it's attributes
    $sql = "SELECT id, dni, name, surname, address, city, country, phone, email FROM clients ORDER BY id";
    $result = mysqli_query($conn, $sql);

    $arrayClients = array();

    //for erach result given, if not 0, create an object Client
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $cli = new Client($row["id"],$row["dni"],$row["name"],$row["surname"],$row["address"],$row["city"],$row["country"],$row["phone"],$row["email"]);
          array_push($arrayClients, $cli);
        }
        $ret[0] = $arrayClients;  #Array with the objects
        $ret[1] = 1;              #Status of the operation complete
    } else {
        $ret[1] = 0;              #Status of the operation, empty
    }

    mysqli_close($conn);
    return $ret;
    
  }
  
  /**
   * Get the last 10 Clients of the DDBB
   * @ret Array with Client objects
   */
  public function getDbLast(){
    $conn = $this->createConnection();

    $ret[0] = null;
    $sql = "SELECT id, dni, name, surname, address, city, country, phone, email FROM clients ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $arrayClients = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $cli = new Client($row["id"],$row["dni"],$row["name"],$row["surname"],$row["address"],$row["city"],$row["country"],$row["phone"],$row["email"]);
          array_push($arrayClients, $cli); #Inserir cada client al array
        }
        $ret[0] = $arrayClients;  #Array with the objects
        $ret[1] = 1;              #Status of the operation complete
    } else {
        $ret[1] = 0;              #Status of the operation, empty
    }

    mysqli_close($conn);
    return $ret;
    
  }
  
  /**
   * Function to create a Client, given it's information
   * @dniI string
   * @nameI string
   * @surnameI string
   * @addressI string
   * @cityI string
   * @countryI string
   * @phoneI string
   * @emailI string
   * return boolean - True if complete
   */
  public function createClient($dniI, $nameI, $surnameI, $addressI, $cityI, $countryI, $phoneI, $emailI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO clients (dni, name, surname, address, city, country, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $dni, $name, $surname, $address, $city, $country, $phone, $email);

    // set parameters and execute
    $dni = $dniI;
    $name = $nameI;
    $surname = $surnameI;
    $address = $addressI;
    $city = $cityI;
    $country = $countryI;
    $phone = $phoneI;
    $email = $emailI;
    $ret = $stmt->execute();
    
    $stmt->close();
    $conn->close();

    return true;
    
  }
  
  /**
   * Update the data of a Client, given the ID of it, and new data
   * @idI int
   * @dniI string
   * @nameI string
   * @surnameI string
   * @addressI string
   * @cityI string
   * @countryI string
   * @phoneI string
   * @emailI string
   * return boolean - True if complete
   */
  public function updateClient($idI, $dniI, $nameI, $surnameI, $addressI, $cityI, $countryI, $phoneI, $emailI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("UPDATE clients set dni=?, name=?, surname=?, address=?, city=?, country=?, phone=?, email=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $dni, $name, $surname, $address, $city, $country, $phone, $email, $id);

    // set parameters and execute
    $dni = $dniI;
    $name = $nameI;
    $surname = $surnameI;
    $address = $addressI;
    $city = $cityI;
    $country = $countryI;
    $phone = $phoneI;
    $email = $emailI;
    $id = $idI;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;

  }
  
  /**
   * Delete a Client based on it's ID
   * @idI int
   * return boolean - True if complete
   */
  public function deleteClient($idI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM clients WHERE id=?");
    $stmt->bind_param("i", $id);

    // set parameters and execute
    $id = $idI;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;
    
  }
  
  /**
   * Generate the details of a Client, searching them by ID
   * @id
   * @ret Array with Client object, and state of the operation
   */
  public function generateDetails($id){

    $conn = $this->createConnection();

    $ret[0] = null;
    $sql = "SELECT id, dni, name, surname, address, city, country, phone, email FROM clients WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cli = new Client($row["id"],$row["dni"],$row["name"],$row["surname"],$row["address"],$row["city"],$row["country"],$row["phone"],$row["email"]);
        $ret[0] = $cli;
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;

  }
  
  /**
   * Get the details of a Client by it's DNI
   * @dni string
   * @ret Array with the Client object, and the state of operation
   */
  public function generateDetailsByDni($dni){

    $conn = $this->createConnection();

    $ret[0] = null;
    $sql = "SELECT id, dni, name, surname, address, city, country, phone, email FROM clients WHERE dni='$dni'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // output data of each row
        $cli = new Client($row["id"],$row["dni"],$row["name"],$row["surname"],$row["address"],$row["city"],$row["country"],$row["phone"],$row["email"]);
        $ret[0] = $cli;
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;

  }

}