<?php

require_once(__DIR__.'/../../../lib/controller/ProductController.php');

$controller = new ProductController();

$controller->deleteProduct($_GET['id']);

$id = $_GET['id'];

$pageTitle = "Delete Status Prod ID: <?php $id ?>";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        
        <div class="col-md-12 jumbotron">
          <h1 class="text-center">Delete Status Prod ID: <?php $_GET['id'] ?></h1>
        </div>
        
        <div class="col-md-8">
          <h2 class="text-center"> Product with ID: <?= $_GET['id'] ?> was succesfully deleted.</h2>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Products</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->