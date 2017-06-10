<?php

require_once(__DIR__.'../../../lib/controller/ProductController.php');

session_start();

$controller = new ProductController();

$det = $controller->getDetails($_GET['id']);

$details = $det[0];

$estatOp = $det[1];

$pageTitle = 'Details of <?= $details->getBrand() ." ". $details->getModel() ?>';

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        
        <div class="col-md-12 jumbotron">
          <h1>Product <b><?= $details->getBrand() ." ". $details->getModel() ." - ". $details->getStock() ?> unit/s</b></h1>
        </div>
        
        <div class="col-md-8">
          <p><b>Id:</b> <?= $details->getId() ?></p>
          <p><b>Ref:</b> <?= $details->getRef() ?></p>
          <p><b>Brand:</b> <?= $details->getBrand() ?></p>
          <p><b>Model:</b> <?= $details->getModel() ?></p>
          <p><b>Stock:</b> <?= $details->getStock() ?></p>
          <p><b>Description:</b> <?= $details->getDescription() ?></p>
          <p><b>Dealer:</b> <?= $details->getDealer() ?></p>
          <p><b>Price:</b> <?= $details->getPrice() ?></p>
          <p><b>Dealer Price:</b> <?= $details->getDealerprice() ?></p>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="index.php">Return to Products</a></p>
          </blockquote>
          <blockquote>
            <p><a href="update.php?id=<?=$_GET['id']?>">Modify Details of the Product</a></p>
            <p><a href="forms/delete.php?id=<?=$_GET['id']?>">Delete Product</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->