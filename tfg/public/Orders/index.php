<?php

$pageTitle = "Orders DB";

$type = "Orders";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?>

      <!--Modal for adding new Clients-->
      <div class="row">
        
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateOrder">Create Order</button>

        <!-- Modal -->
        <div class="modal fade" id="CreateOrder" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create new Order</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline">
                  <h2 class="text-center">Client Info</h2>
                  <div class="form-group">
                    <label for="s1" class="formDniLoad">Dni:</label></br>
                    <input class="form-control formDniLoad" type="text" name="dni" id="dni" tabindex="1" placeholder="Dni of an existing Client">
                    </br class="formDniLoad">
                    <button type="button" id="buttonLoadDniData" class="btn btn-success formDniLoad" onclick="getClientDetails()">Load Client Data</button>
                  </div>
                  </br>
                  <h2 class="text-center">Products</h2>
                  <div class="form-group">
                    <label for="s2">Product:</label></br>
                    <input class="form-inline input-group-lg" type="text" name="ref" id="ref" tabindex="2" placeholder="Ref of the Product">
                    <label for="s2">Units:</label></br>
                    <input type="number" value="1" id="units" placeholder="Units" step="number"></input>
                    <button type="button" id="buttonLoadProductData" class="btn btn-success" onclick="getProductDetails()">Add Product</button>
                  </div>
                  </br>
                  <div class="form-group">
                    <table class="col-md-12">
                      <table class="table table-bordered">
                        <tr id="headerTableProducts">
                          <th class="text-center">ID</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Units</th><th class="text-center">Price/Unit</th><th class="text-center">Total Price</th>
                        </tr class="prodTable">
                    </table>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                </br>
                <button class="btn btn-success" type="submit" tabindex="9" onclick="checkAllFieldsInserted()">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanModalInputs()">Cancel</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      
      <div class="row">
        
        
        <!--Div where the List of Orders is inserted-->
        <div class="col-md-9">
          <h1 class="text-center">List of Orders</h1>
          
          <div id="ordersTable"></div>
          
        </div>
        
        
        <!--Lateral menu for navigation-->
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
        
      </div>
  
<?php include(__DIR__.'/../resources/inc/footer.php'); ?>