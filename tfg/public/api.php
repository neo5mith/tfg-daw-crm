<?php
require_once(__DIR__.'/../../vendor/autoload.php');
require_once(__DIR__.'/../lib/controller/ClientController.php');
require_once(__DIR__.'/../lib/controller/DashboardController.php');
require_once(__DIR__.'/../lib/controller/OrderController.php');
require_once(__DIR__.'/../lib/controller/ProductController.php');

$app = new \Slim\App();


//CLIENTS--------------------

//Get all clients
$app->get('/clients', function($request, $response, array $args){
    $cnt = new ClientController();
    $clients = $cnt->getClients();
    
    $clientsA = array();
    foreach($clients[0] as $c){
        array_push($clientsA, $c->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($clientsA));

    return $response;
});

//Get all clients DNI to JSON, used to look for autocomplete
$app->get('/clientsdni', function($request, $response, array $args){
    $cnt = new ClientController();
    $clients = $cnt->getClients();
    
    $clientsA = array();
    foreach($clients[0] as $c){
        array_push($clientsA, ["dni" => $c->getDni(), "surname" => $c->getSurname()]);
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($clientsA));

    return $response;
});


//Get Client Details
$app->get('/clientDet/{id}', function($request, $response, array $args){
    $pid = $args['id'];
    $cnt = new ClientController();
    $clientDet = $cnt->getDetails($pid);
    
    $clientDetails = $clientDet[0]->toArray();
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($clientDetails));

    return $response;
});


//Get Client Details by DNI
$app->get('/clientDetByDni/{dni}', function($request, $response, array $args){
    $pdni = $args['dni'];
    $cnt = new ClientController();
    $clientDet = $cnt->getDetailsByDni($pdni);
    
    $clientDetails = $clientDet[0]->toArray();
    
    //console.log("Detalls: "+clientDetails);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($clientDetails));

    return $response;
});


//Insert Client
$app->post('/client', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new ClientController();
    $cnt->addClient($data['dni'], $data['name'],$data['surname'], $data['address'], $data['city'], $data['country'], $data['phone'], $data['mail']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


// Delete client
$app->delete('/client/{id}', function($request, $response, array $args){
    $pid = $args['id'];
    $cnt = new ClientController();
    $client = $cnt->deleteClient($pid);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


// Update Client Details
$app->put('/clientUpdate', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new ClientController();
    $cnt->updateClient($data['id'], $data['dni'], $data['name'],$data['surname'], $data['address'], $data['city'], $data['country'], $data['phone'], $data['mail']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


//PRODUCTS--------------------

//Get all products
$app->get('/products', function($request, $response, array $args){
    $cnt = new ProductController();
    $products = $cnt->getProducts();
    
    $productsA = array();
    foreach($products[0] as $p){
        array_push($productsA, $p->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productsA));

    return $response;
});


//Get all products Ref and put them into a JSON, used for autocomplete
$app->get('/productsref', function($request, $response, array $args){
    $cnt = new ProductController();
    $products = $cnt->getProducts();
    
    $productsA = array();
    foreach($products[0] as $p){
        $brandModel = $p->getBrand()." - ".$p->getModel();
        array_push($productsA, ["ref" => $p->getRef(), "brandModel" => $brandModel]);
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productsA));

    return $response;
});


//Get Product Details
$app->get('/productDet/{id}', function($request, $response, array $args){
    $pid = $args['id'];
    $cnt = new ProductController();
    $productDet = $cnt->getDetails($pid);
    
    $productDetails = $productDet[0]->toArray();
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productDetails));

    return $response;
});


//Get Product Details By Ref
$app->get('/productDetByRef/{ref}', function($request, $response, array $args){
    $pref = $args['ref'];
    $cnt = new ProductController();
    $productDet = $cnt->getDetailsByRef($pref);
    
    $productDetails = $productDet[0]->toArray();
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productDetails));

    return $response;
});


//Insert Product
$app->post('/product', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new ProductController();
    $cnt->addProduct($data['ref'], $data['brand'],$data['model'], $data['stock'], $data['description'], $data['dealer'], $data['price'], $data['dealerPrice']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


// Delete Product
$app->delete('/product/{id}', function($request, $response, array $args){
    $pid = $args['id'];
    $cnt = new ProductController();
    $product = $cnt->deleteProduct($pid);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


// Update Product Details
$app->put('/productUpdate', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new ProductController();
    $cnt->updateProduct($data['id'], $data['ref'], $data['brand'],$data['model'], $data['stock'], $data['description'], $data['dealer'], $data['price'], $data['dealerPrice']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});

// Update Product Stock
$app->put('/productStockUpdate', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new ProductController();
    $cnt->updateProduct($data['id'], $data['stock']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


//Upload Image for product (IN PROCESS_________________________)



//ORDERS----------------------

//Get all orders
$app->get('/orders', function($request, $response, array $args){
    
    $cnt = new OrderController();
    
    $orders = $cnt->getOrders();   //Get the return of all orders 
    
    $ordersA = array(); //Array for all orders
    
    foreach($orders as $ord){
        array_push($ordersA, $ord->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($ordersA));

    return $response;
});


// Create Order
$app->post('/order', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new OrderController();
    
    $ret = $cnt->addOrder($data['dni'], $data['totalPrice'],$data['products'],$data['units']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


//Get a single order details
$app->get('/orderDetail/{id}', function($request, $response, array $args){
    $oid = $args['id'];
    $cnt = new OrderController();
    
    $order = $cnt->getDetails($oid);
    
    $orderDetails = $order->toArray();
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($orderDetails));

    return $response;
});


//Update status of the order
$app->put('/orderStatusUpd', function($request, $response, array $args){
    $data = $request->getParsedBody();
    
    $cnt = new OrderController();
    $cnt->updateOrder($data['id'], $data['status']);
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($data));

    return $response;
});


//DASHBOARD-------------------

//Get 10 last Orders



//Get last Clients
$app->get('/dashboard/lastClients', function($request, $response, array $args){
    $cnt = new ClientController();
    $clients = $cnt->getLastClients();
    
    $clientsA = array();
    foreach($clients[0] as $c){
        array_push($clientsA, $c->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($clientsA));

    return $response;
});


//Get last Products
$app->get('/dashboard/lastProducts', function($request, $response, array $args){
    $cnt = new ProductController();
    $products = $cnt->getLastProducts();
    
    $productsA = array();
    foreach($products[0] as $p){
        array_push($productsA, $p->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productsA));

    return $response;
});


//Get Products with stock under 50
$app->get('/dashboard/StockWarning', function($request, $response, array $args){
    $cnt = new ProductController();
    $products = $cnt->alarmStock();
    
    $productsA = array();
    foreach($products[0] as $p){
        array_push($productsA, $p->toArray());
    }
    
    $response = $response->withHeader('Content-type', 'application/json');
    $body = $response->getBody();
    $body->write(json_encode($productsA));

    return $response;
});



$app->run();
