<?php

require_once(__DIR__.'/../../../lib/controller/ProductController.php');

$controller = new ProductController();

$stat = $controller->addProduct($_POST['ref'], $_POST['brand'], $_POST['model'], $_POST['stock'], $_POST['description'], $_POST['dealer'], $_POST['price'], $_POST['dealerprice']);

$refName = $_POST['ref'] . " - " . $_POST['brand'] . " " . $_POST['model'];

$pageTitle = "Add Status <?php $refName ?>";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        <div class="col-md-12 jumbotron">
          <h1 class="text-center">Status Adition <?php $refName ?></h1>
        </div>
        <div class="col-md-8">
          <h2 class="text-center"> <?= $refName ?> with <?= $stock ?> unities was succesfully added.</h2>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Products</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->