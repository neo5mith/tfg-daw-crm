<?php

$pageTitle = "PRODUCTS DB";

$type = "Products";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->
      
      <!--Modal for adding new Products-->
      <div class="row">
        
         <!--Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Add Product</button>

         <!--Modal -->
        <div class="modal fade" id="AddModal" role="dialog">
          <div class="modal-dialog">
          
             <!--Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Product</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Ref:</label>
                    <input class="form-control" type="number" id="ref" name="ref" tabindex="1">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Brand:</label>
                    <input class="form-control" type="text" id="brand" name="brand" tabindex="2">
                    <!--<input class="form-control" type="text" id="brands" name="brand" tabindex="2">-->
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Model:</label>
                    <input class="form-control" type="text" id="model"name="model" tabindex="3">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Stock:</label>
                    <input class="form-control" type="number" id="stock" name="stock" tabindex="4">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Description:</label>
                    <input class="form-control" type="text" id="description" name="description" tabindex="5">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">Dealer:</label>
                    <input class="form-control" type="text" id="dealer" name="dealer" tabindex="6">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Price:</label>
                    <input class="form-control" type="number" id="price" name="price" tabindex="7" step="0.01">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Dealer Price:</label>
                    <input class="form-control" type="number" id="dealerPrice" name="dealerprice" tabindex="8" step="0.01">
                  </div>
                  </br>
                  <!--<div class="form-group">-->
                  <!--  <label for="s7">Photo:</label>-->
                  <!--  <input class="form-control" type="text" name="photo" tabindex="9">-->
                  <!--</div>-->
                  <!--</br>-->
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
      
      
      <!--Modal for Viewing Product details-->
      <div class="row">
                
        <!--Modal -->
        <div class="modal fade" id="InfoModal" role="dialog">
          <div class="modal-dialog">
          
            <!--Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Data</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Id:</label></br>
                    <input class="form-control" type="text" name="id" id="iid" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s1">Ref:</label></br>
                    <input class="form-control" type="text" name="ref" id="iref" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Brand:</label></br>
                    <input class="form-control" type="text" name="brand" id="ibrand" tabindex="2" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Model:</label></br>
                    <input class="form-control" type="text" name="model" id="imodel" tabindex="3" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Stock:</label></br>
                    <input class="form-control" type="text" name="stock" id="istock" tabindex="4" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">Description:</label></br>
                    <input class="form-control" type="text" name="description" id="idescription" tabindex="5" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Dealer:</label></br>
                    <input class="form-control" type="text" name="dealer" id="idealer" tabindex="6" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Price:</label></br>
                    <input class="form-control" type="text" name="price" id="iprice" tabindex="7" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s8">Dealer Price:</label></br>
                    <input class="form-control" type="dealerPrice" name="dealerPrice" id="idealerPrice" tabindex="8" readonly>
                  </div>
                  </br>
                </form>
              </div>
              <div class="modal-footer">
                </br>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanModalInputs()">Cancel</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      
      <!--Modal for Updating Product details.-->
      <div class="row">

         <!--Modal -->
        <div class="modal fade" id="UpdateModal" role="dialog">
          <div class="modal-dialog">
          
             <!--Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Data Update</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Id:</label></br>
                    <input class="form-control" type="text" name="id" id="uid" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s1">Ref:</label></br>
                    <input class="form-control" type="text" name="ref" id="uref" tabindex="2">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Brand:</label></br>
                    <input class="form-control" type="text" name="brand" id="ubrand" tabindex="3">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Model:</label></br>
                    <input class="form-control" type="text" name="model" id="umodel" tabindex="4">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Stock:</label></br>
                    <input class="form-control" type="text" name="stock" id="ustock" tabindex="5">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">Description:</label></br>
                    <input class="form-control" type="text" name="description" id="udescription" tabindex="6">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Dealer:</label></br>
                    <input class="form-control" type="text" name="dealer" id="udealer" tabindex="7">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Price:</label></br>
                    <input class="form-control" type="text" name="price" id="uprice" tabindex="8">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s8">Dealer Price:</label></br>
                    <input class="form-control" type="dealerPrice" name="dealerPrice" id="udealerPrice" tabindex="9">
                  </div>
                  </br>
                </form>
              </div>
              <div class="modal-footer">
                </br>
                <button class="btn btn-success" type="submit" tabindex="9" onclick="checkAllFieldsInsertedUpd()" tabindex="10">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanModalInputs()" tabindex="11">Cancel</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      
      <!--Modal for deleting a Product-->
      <div class="row">

        <div id="DelModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
             <!--Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alert of deleting</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete the selected Product?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-deleteSure-product="" id="delYes">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>
        
          </div>
        </div>
        
      </div>
      
      <div class="row">
      
        <!--Div where the List of clients is inserted-->
        <div class="col-md-9">
          <h1 class="text-center">List of Products</h1>
          
          <div id="productsTable"></div>
          
        </div>
        
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->