<?php

$pageTitle = "NEOSMITH CRM";

$type = "Dashboard";

?>
    
<?php include(__DIR__.'/resources/inc/header.php'); ?> <!--Header-->
    
    <!--Reload all button-->
    <div class="row">
                
      <div class="col-md-offset-11 col-md-1">
        <a class="btn-sm btn-success " role="button" onclick="loadAll()">R</a>
      </div>
        
    </div>
    
    <!--Buttons for diferent section-->
    <div class="row">
      
      <div class="col-md-4 col-sm-4 text-center">
        <a href="/Clients" class="btn-lg btn-primary " role="button">Clients</a>
      </div>
      
      <div class="col-md-4 col-sm-4 text-center">
        <a href="/Products" class="btn-lg btn-primary" role="button">Products</a>
      </div>
      
      <div class="col-md-4 col-sm-4 text-center">
        <a href="/Orders" class="btn-lg btn-primary" role="button">Orders</a>
      </div>
      
    </div>
    
    </br>
    
    <!--Dashboard info-->
    <div class="row">
      
      <!--Grpahics-->
      <div class="col-md-12 col-sm-12">
        
        <!--Orders with payed status-->
        <div class="col-md-6 col-sm-12 text-center">
          
          <h2>Inner earnings by Payed Client Orders</h2>
          <div id="earnedMoney" class="col-md-12 col-sm-12"></div>
          
        </div>
        
        <!--Orders with reserved status-->
        <div class="col-md-6 col-sm-12 text-center">
          
          <h2>Pending earnings from Reserved Orders</h2>
          <div id="pendingMoney" class="col-md-12 col-sm-12"></div>
          
        </div>
        
      </div>
      
      <!--Stock products under 50 units, and last orders-->
      <div class="col-md-12 col-sm-12 text-center">
        
        <div class="col-md-12 col-sm-12 text-center">
          
          <h2>Products under 50 units !</h2>
          <div id="stockWarning" class="col-md-12"></div>
          
        </div>
        
        <div class="col-md-12 col-sm-12 text-center">
          
          <h2>Reserved Orders</h2>
          <div id="lastOrders" class="col-md-12"></div>
          
        </div>
        
      </div>
      
      <!--Last clients added and last products added-->
      <div class="col-md-12 col-sm-12 text-center">
        
        <div class="col-md-6 col-sm-12 text-center">
          
          <h2>10 last new Clients</h2>
          
          <div id="lastClients" class="col-md-12"></div>
          
        </div>
        
        <div class="col-md-6 col-sm-12 text-center">
          
          <h2>10 last new Products</h2>
  
          <div id="lastProducts" class="col-md-12 tablesorter"></div>
        
        </div>
      
      </div>
      
    </div>
      
<?php include(__DIR__.'/resources/inc/footer.php'); ?>