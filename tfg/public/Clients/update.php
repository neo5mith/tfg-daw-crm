<?php

require_once(__DIR__.'../../../lib/controller/ClientController.php');

session_start();

$controller = new ClientController();

$det = $controller->getDetails($_GET['id']);

$details = $det[0];

$name = $details->getName();

$surname = $details->getSurname();

$pageTitle = "CLIENT UPDATE - $name $surname";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->

    <div id="createform" class="col-md-6 col-md-offset-2 col-sm-12">
      <form action="forms/update.php" method="post">
        <div class="row">
          <label class="col-md-2" for="input-id">Id</label>
        	<input class="col-md-4" type="text" name="id" value="<?=$details->getId()?>" readonly/>
          </br>
          <small class="col-md-12">The ID can not be changed</small>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-name">DNI</label>
        	<input class="col-md-6" type="text" name="dni" value="<?=$details->getDni()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-name">Name</label>
        	<input class="col-md-6" type="text" name="name" value="<?=$details->getName()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-surname">Surname</label>
        	<input class="col-md-4" type="text" name="surname" value="<?=$details->getSurname()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-address">Address</label>
        	<input class="col-md-4" type="text" name="address" value="<?=$details->getAddress()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-address">City</label>
        	<input class="col-md-4" type="text" name="city" value="<?=$details->getCity()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-address">Country</label>
        	<input class="col-md-4" type="text" name="country" value="<?=$details->getCountry()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-address">Phone</label>
        	<input class="col-md-4" type="text" name="phone" value="<?=$details->getPhone()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-address">Email</label>
        	<input class="col-md-4" type="text" name="email" value="<?=$details->getMail()?>"/>
        </div>
        </br>
        <button class="btn btn-default" type="submit" name="submit">Update</button>
      </form>
    </div>
    
    <div class="col-md-4">
      <blockquote>
        <p><a href="/index.php">Return to DashBoard</a></p>
        <p><a href="index.php">Return to Clients</a></p>
      </blockquote>
      <blockquote>
        <p><a href="detail.php?id=<?=$_GET['id']?>">Return to Details of the Client</a></p>
        <p><a href="delete.php?id=<?=$_GET['id']?>">Delete Client</a></p>
      </blockquote>
    </div>
    
<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->