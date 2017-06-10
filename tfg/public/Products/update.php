<?php

require_once(__DIR__.'../../../lib/controller/ProductController.php');

session_start();

$controller = new ProductController();

$det = $controller->getDetails($_GET['id']);

$details = $det[0];

$pageTitle = "PRODUCT UPDATE";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->

    <h1 class="jumbotron text-center col-md-12 col-sm-12">Updating <?= $details->getRef() . " - " . $details->getBrand() . " " . $details->getModel() ?></h1>
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
        	<label class="col-md-2" for="input-ref">Ref</label>
        	<input class="col-md-6" type="number" name="ref" value="<?=$details->getRef()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-brand">Brand</label>
        	<input class="col-md-6" type="text" name="brand" value="<?=$details->getBrand()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-model">Model</label>
        	<input class="col-md-6" type="text" name="model" value="<?=$details->getModel()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-stock">Stock</label>
        	<input class="col-md-4" type="number" name="stock" value="<?=$details->getStock()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-description">Description</label>
        	<input class="col-md-4" type="text" name="description" value="<?=$details->getDescription()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-dealer">Dealer</label>
        	<input class="col-md-4" type="text" name="dealer" value="<?=$details->getDealer()?>"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-price">Price</label>
        	<input class="col-md-4" type="number" name="price" value="<?=$details->getPrice()?>" step="0.01"/>
        </div>
        </br>
        <div class="row">
        	<label class="col-md-2" for="input-dealerprice">Dealer Price</label>
        	<input class="col-md-4" type="number" name="dealerprice" value="<?=$details->getDealerprice()?>" step="0.01"/>
        </div>
        </br>
        <input type="submit" brand="submit" value="Update"/>
      </form>
    </div>
    
    <div class="col-md-4">
      <blockquote>
        <p><a href="/index.php">Return to DashBoard</a></p>
        <p><a href="index.php">Return to Products</a></p>
      </blockquote>
      <blockquote>
        <p><a href="detail.php?id=<?=$_GET['id']?>">Return to Details of the Product</a></p>
        <p><a href="delete.php?id=<?=$_GET['id']?>">Delete Product</a></p>
      </blockquote>
    </div>
    
<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->