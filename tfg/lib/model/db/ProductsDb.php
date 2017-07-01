<?php

require_once(__DIR__.'/../Product.php');

class ProductDb{

  public function createConnection(){
    $serverbrand = "localhost";
    $userbrand = "usuari";
    $password = "contra.s&enyaS3gur4";
    $dbbrand = "tfg";

    // Create connection
    $conn = mysqli_connect($serverbrand, $userbrand, $password, $dbbrand);
    // var_dump($conn);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
  }
  
  
  public function getDb(){
    $conn = $this->createConnection();

    // var_dump(mysqli_error($conn));
    // die;
    
    $ret[0] = null;
    $sql = "SELECT id, ref, brand, model, stock, description, dealer, price, dealerprice FROM products ORDER BY id";
    $result = mysqli_query($conn, $sql);
    
    // var_dump(mysqli_error($sql));
    // die;
    
    // var_dump($result);
    // die;

    $arrayProducts = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $prod = new Product($row["id"],$row["ref"],$row["brand"],$row["model"],$row["stock"],$row["description"],$row["dealer"],$row["price"],$row["dealerprice"]);
          array_push($arrayProducts, $prod); #Inserir cada product al array
        }
        $ret[0] = $arrayProducts; #array amb els objectes, el posem al array de retorn
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;
  }
  
  public function getDbLast(){
    $conn = $this->createConnection();

    // var_dump(mysqli_error($conn));
    // die;
    
    $ret[0] = null;
    $sql = "SELECT id, ref, brand, model, stock, description, dealer, price, dealerprice FROM products ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    
    // var_dump(mysqli_error($sql));
    // die;
    
    // var_dump($result);
    // die;

    $arrayProducts = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $prod = new Product($row["id"],$row["ref"],$row["brand"],$row["model"],$row["stock"],$row["description"],$row["dealer"],$row["price"],$row["dealerprice"]);
          array_push($arrayProducts, $prod); #Inserir cada product al array
        }
        $ret[0] = $arrayProducts; #array amb els objectes, el posem al array de retorn
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;
  }

  public function createProduct($refI, $brandI, $modelI, $stockI, $descriptionI, $dealerI, $priceI, $dealerpriceI){
    $conn = $this->createConnection();
    
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO products (ref, brand, model, stock, description, dealer, price, dealerprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ississss", $ref, $brand, $model, $stock, $description, $dealer, $price, $dealerprice);

    // set parameters and execute
    $ref = $refI;
    $brand = $brandI;
    $model = $modelI;
    $stock = $stockI;
    $description = $descriptionI;
    $dealer = $dealerI;
    $price = $priceI;
    $dealerprice = $dealerpriceI;
    $ret = $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;
  }

  public function updateProduct($idI, $refI, $brandI, $modelI, $stockI, $descriptionI, $dealerI, $priceI, $dealerpriceI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("UPDATE products set ref=?, brand=?, model=?, stock=?, description=?, dealer=?, price=?, dealerprice=? WHERE id=?");
    $stmt->bind_param("ississiii", $ref, $brand, $model, $stock, $description, $dealer, $price, $dealerprice, $id);

    // set parameters and execute
    $ref = $refI;
    $brand = $brandI;
    $model = $modelI;
    $stock = $stockI;
    $description = $descriptionI;
    $dealer = $dealerI;
    $price = $priceI;
    $dealerprice = $dealerpriceI;
    $id = $idI;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;

  }
  
  public function updateStock($idI, $stockI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("UPDATE products set stock=? WHERE id=?");
    $stmt->bind_param("ii", $stock, $id);

    // set parameters and execute
    $stock = $stockI;
    $id = $idI;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;

  }

  public function deleteProduct($idI){
    $conn = $this->createConnection();

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);

    // set parameters and execute
    $id = $idI;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;
  }

  public function generateDetails($id){

    $conn = $this->createConnection();

    $ret[0] = null;
    $sql = "SELECT id, ref, brand, model, stock, description, dealer, price, dealerprice FROM products WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // output data of each row
        $prod = new Product($row["id"],$row["ref"],$row["brand"],$row["model"],
            $row["stock"],$row["description"],$row["dealer"],$row["price"],
            $row["dealerprice"]);
            
        //array_push($arrayProducts, $prod); #Inserir cada product al array
        //$ret[0] = $arrayProducts; #array amb els objectes, el posem al array de retorn
        $ret[0] = $prod;
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }
        
    mysqli_close($conn);
    return $ret;

  }
  
  public function generateDetailsByRef($ref){

    $conn = $this->createConnection();

    $ret[0] = null;
    $sql = "SELECT id, ref, brand, model, stock, description, dealer, price, dealerprice FROM products WHERE ref=$ref";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // output data of each row
        $prod = new Product($row["id"],$row["ref"],$row["brand"],$row["model"],$row["stock"],$row["description"],$row["dealer"],$row["price"],$row["dealerprice"]);
        //array_push($arrayProducts, $prod); #Inserir cada product al array
        //$ret[0] = $arrayProducts; #array amb els objectes, el posem al array de retorn
        $ret[0] = $prod;
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;

  }
  
  // Get the products under 50 unities of stock
  public function getProductsUnderStock(){
    $conn = $this->createConnection();
    
    $ret[0] = null;
    $sql = "SELECT * FROM products WHERE stock <50 ORDER BY stock";
    $result = mysqli_query($conn, $sql);
    
    $arrayProducts = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $prod = new Product($row["id"],$row["ref"],$row["brand"],$row["model"],$row["stock"],$row["description"],$row["dealer"],$row["price"],$row["dealerprice"]);
          array_push($arrayProducts, $prod); #Inserir cada product al array
        }
        $ret[0] = $arrayProducts; #array amb els objectes, el posem al array de retorn
        $ret[1] = 1; #Estat de l'operacio, completat
    } else {
        $ret[1] = 0; #Estat de l'operacio, array buit
    }

    mysqli_close($conn);
    return $ret;
  }
  
}