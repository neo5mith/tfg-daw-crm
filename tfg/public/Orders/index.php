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
                    <input class="form-control input-group-lg" type="text" name="ref" id="ref" tabindex="2" placeholder="Ref of the Product">
                    <label for="s2">Units:</label></br>
                    <input class="form-control" type="number" value="1" id="units" placeholder="Units" step="number"></input>
                    <button type="button" id="buttonLoadProductData" class="btn btn-success" onclick="checkRefUnits()">Add Product</button>
                  </div>
                  </br>
                  </br>
                  <div class="form-group col-md-12">
                    <table class="table table-bordered" id="tblprod">
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
        
        <!-- Modal for details of the order-->
        <div id="detailOrder" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="cleanModalInputs()">&times;</button>
                <h4 class="modal-title">Order Details</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Order Id:</label></br>
                    <input class="form-control" type="text" name="id" id="did" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Buy Date:</label></br>
                    <input class="form-control" type="text" id="dbuyDate" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Total Price:</label></br>
                    <input class="form-control" type="text" id="dtotalPrice" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Status:</label></br>
                    <input class="form-control" type="text" id="dstatus" tabindex="1" readonly>
                  </div>
                  
                  </br>
                  <h3>Client Info</h3>
                  </br>
                  <div class="form-group">
                    <label for="s1">Dni:</label></br>
                    <input class="form-control" type="text" name="dni" id="ddni" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s2">Name:</label></br>
                    <input class="form-control" type="text" name="name" id="dname" tabindex="2" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s3">Surname:</label></br>
                    <input class="form-control" type="text" name="surname" id="dsurname" tabindex="3" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s4">Address:</label></br>
                    <input class="form-control" type="text" name="address" id="daddress" tabindex="4" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s5">City:</label></br>
                    <input class="form-control" type="text" name="city" id="dcity" tabindex="5" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s6">Country:</label></br>
                    <input class="form-control" type="text" name="country" id="dcountry" tabindex="6" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s7">Phone:</label></br>
                    <input class="form-control" type="text" name="phone" id="dphone" tabindex="7" readonly>
                  </div>
                  <div class="form-group">
                    <label for="s8">Mail:</label></br>
                    <input class="form-control" type="email" name="mail" id="dmail" tabindex="8" readonly>
                  </div>
                  </br>
                  <h3>Products</h3>
                  <div class="form-group col-md-12">
                    <table class="col-md-12">
                      <table class="table table-bordered">
                        <tr id="headerTableProductsDet">
                          <th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Units</th><th class="text-center">Price/Unit</th><th class="text-center">Total Price</th>
                        </tr class="prodTableDetails">
                    </table>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                </br>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanModalInputs()">Close</button>
              </div>
            </div>
        
          </div>
        </div>
        
      </div>
      
      <div class="row">
        
        <!-- Modal for Editing State of the order-->
        <div id="UpdateOrderState" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Status Update</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Order Id:</label></br>
                    <input class="form-control" type="text" id="uid" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Buy Date:</label></br>
                    <input class="form-control" type="text" id="ubuyDate" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Total Price:</label></br>
                    <input class="form-control" type="text" id="utotalPrice" tabindex="1" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="s1">Status:</label></br>
                    <select class="form-control" type="text" id="ustatus" tabindex="1">
                      <option value="Payed">Payed</option>
                      <option value="Cancelled">Cancelled</option>
                      <option value="Order Generated">Order Generated</option>
                      <option value="Reserved">Reserved</option>
                    </select>
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                </br>
                <button type="button" class="btn btn-success" onclick="updateOrderStatus()">Update Status</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanModalInputs()">Close</button>
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
          
          <div id="totalPrice"></div>
          
        </div>
        
        
        <!--Lateral menu for navigation-->
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
        
      </div>
  
<?php include(__DIR__.'/../resources/inc/footer.php'); ?>