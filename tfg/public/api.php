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


//Get Client Details
$app->get('/clients/{id}', function($request, $response, array $args){
    $cnt = new ClientController();
    $clientDetails = $cnt->getDetails($id);
    
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


//PRODUCTS--------------------

//ORDERS----------------------

//DASHBOARD-------------------

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
