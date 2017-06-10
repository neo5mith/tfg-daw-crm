<?php

$pageTitle = "NEOSMITH CRM";

$type = "Dashboard";

?>
    
<?php include(__DIR__.'/resources/inc/header.php'); ?> <!--Header-->
    
    <div class="row">
        
      <div class="col-md-12 text-center">
        <p>In theory this page is the Main one, with the dashboard.</p>  
      </div>
      
    </div>
    
    <div class="row">
      
      <div class="col-md-4 text-center">
        <a href="/Clients" class="btn btn-primary" role="button">Clients</a>
      </div>
      
      <div class="col-md-4 text-center">
        <a href="/Products" class="btn btn-primary" role="button">Products</a>
      </div>
      
      <div class="col-md-4 text-center">
        <a href="/Orders" class="btn btn-primary" role="button">Orders</a>
      </div>
      
    </div>
    
    <div class="row">
      
      <!--Graphic about earned Money-->
      <div id="earnedMoney" class="col-md-12">
        
      </div>
      
      <!--Stock products under 50 units, and last orders-->
      <div class="col-md-12 text-center">
        
        <div class="col-md-6 text-center">
          
          <h2>Products under 50 units !</h2>
          <div id="stockWarning" class="col-md-6"></div>
          
        </div>
        
        <div class="col-md-6 text-center">
          
          <h2>Last 10 Orders</h2>
          <div id="lastOrders" class="col-md-6"></div>
          
        </div>
        
      </div>
      
      <!--Last clients added and last products added-->
      <div class="col-md-12 text-center">
        
        <div class="col-md-6 text-center">
          
          <h2>10 last new Clients</h2>
          
          <div id="lastClients" class="col-md-12"></div>
          
        </div>
        
        <div class="col-md-6 text-center">
          
          <h2>10 last new Products</h2>
  
          <div id="lastProducts" class="col-md-12"></div>
        
        </div>
      
      </div>
      
    </div>
      
<?php include(__DIR__.'/resources/inc/footer.php'); ?>