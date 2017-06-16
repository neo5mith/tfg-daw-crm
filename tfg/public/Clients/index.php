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
                    <label for="s1">Dni:</label></br>
                    <input class="form-control" type="text" name="dni" id="dni" tabindex="1">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Name:</label></br>
                    <input class="form-control" type="text" name="name" id="name" tabindex="2">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Surname:</label></br>
                    <input class="form-control" type="text" name="surname" id="surname" tabindex="3">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Address:</label></br>
                    <input class="form-control" type="text" name="address" id="address" tabindex="4">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">City:</label></br>
                    <input class="form-control" type="text" name="city" id="city" tabindex="5">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Country:</label></br>
                    <input class="form-control" type="text" name="country" id="country" tabindex="6">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Phone:</label></br>
                    <input class="form-control" type="text" name="phone" id="phone" tabindex="7" >
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s8">Mail:</label></br>
                    <input class="form-control" type="email" name="mail" id="mail" tabindex="8">
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
      
      
      <!--Modal for Viewing Client details-->
      <div class="row">
                
        <!-- Trigger the modal with a button -->
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InfoModal">Client Data</button>-->
        
        <!-- Modal -->
        <div class="modal fade" id="InfoModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Client Data</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Id:</label></br>
                    <input class="form-control" type="text" name="id" id="iid" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s1">Dni:</label></br>
                    <input class="form-control" type="text" name="dni" id="idni" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Name:</label></br>
                    <input class="form-control" type="text" name="name" id="iname" tabindex="2" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Surname:</label></br>
                    <input class="form-control" type="text" name="surname" id="isurname" tabindex="3" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Address:</label></br>
                    <input class="form-control" type="text" name="address" id="iaddress" tabindex="4" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">City:</label></br>
                    <input class="form-control" type="text" name="city" id="icity" tabindex="5" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Country:</label></br>
                    <input class="form-control" type="text" name="country" id="icountry" tabindex="6" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Phone:</label></br>
                    <input class="form-control" type="text" name="phone" id="iphone" tabindex="7" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s8">Mail:</label></br>
                    <input class="form-control" type="email" name="mail" id="imail" tabindex="8" readonly>
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
      
      
      <!--Modal for Updating Client details.-->
      <div class="row">

        <!-- Modal -->
        <div class="modal fade" id="UpdateModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Client Data Update</h4>
              </div>
              <div class="modal-body">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="s1">Id:</label></br>
                    <input class="form-control" type="text" name="id" id="uid" tabindex="1" readonly>
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s1">Dni:</label></br>
                    <input class="form-control" type="text" name="dni" id="udni" tabindex="2">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s2">Name:</label></br>
                    <input class="form-control" type="text" name="name" id="uname" tabindex="3">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s3">Surname:</label></br>
                    <input class="form-control" type="text" name="surname" id="usurname" tabindex="4">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s4">Address:</label></br>
                    <input class="form-control" type="text" name="address" id="uaddress" tabindex="5">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s5">City:</label></br>
                    <input class="form-control" type="text" name="city" id="ucity" tabindex="6">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s6">Country:</label></br>
                    <input class="form-control" type="text" name="country" id="ucountry" tabindex="7">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s7">Phone:</label></br>
                    <input class="form-control" type="text" name="phone" id="uphone" tabindex="8">
                  </div>
                  </br>
                  <div class="form-group">
                    <label for="s8">Mail:</label></br>
                    <input class="form-control" type="email" name="mail" id="umail" tabindex="9">
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
      
      
      <!--Modal for deleting a Client-->
      <div>

        <div id="DelModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
             Modal content
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alert of deleting</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete the selected Client?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-deleteSure-client="" id="delYes">Yes</button>
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
          
          <div id="clientsTable"></div>
          
        </div>
        
        
        <!--Lateral menu for navigation-->
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
        
      </div>
    
    
<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->