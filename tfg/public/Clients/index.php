<?php

$pageTitle = "CLIENTS DB";

$type = "Clients";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->
      
      <!--Modal for adding new Clients-->
      <div class="row">
        
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Add Client</button>

        <!-- Modal -->
        <div class="modal fade" id="AddModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Client</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Dni:</label>
                    <input class="form-control required" type="text" name="dni" id="dni" tabindex="1" required>
                  </div>
                  <div class="form-group">
                    <label for="s2">Name:</label>
                    <input class="form-control required" type="text" name="name" id="name" tabindex="2" required>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Surname:</label>
                    <input class="form-control required" type="text" name="surname" id="surname" tabindex="3" required>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Address:</label>
                    <input class="form-control required" type="text" name="address" id="address" tabindex="4" required>
                  </div>
                  <div class="form-group">
                    <label for="s5">City:</label>
                    <input class="form-control required" type="text" name="city" id="city" tabindex="5" required>
                  </div>
                  <div class="form-group">
                    <label for="s6">Country:</label>
                    <input class="form-control required" type="text" name="country" id="country" tabindex="6" required>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Phone:</label>
                    <input class="form-control required" type="text" name="phone" id="phone" tabindex="7" required>
                  </div>
                  <div class="form-group">
                    <label for="s8">Mail:</label>
                    <input class="form-control required" type="email" name="mail" id="mail" tabindex="8" required>
                  </div>
                  </br>
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
      
      <!--Modal for Viewing Client details and edit them.-->
      <div>
        
        
        
      </div>
      
      <!--Modal for deleting a Client-->
      <div>

        <!-- Modal -->
        <div id="DelModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alert of deleting</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete the selected Client?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="delYes">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>
        
          </div>
        </div>
        
      </div>
      
      <div class="row">
        
        <!--Div where the List of clients is inserted-->
        <div class="col-md-9">
          <h1 class="text-center">List of Clients</h1>
          
          <div id="tralari"></div>
          
        </div>
        
        <!--Lateral menu for navigation-->
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
      </div>
    
<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->