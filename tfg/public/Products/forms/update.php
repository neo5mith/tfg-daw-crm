<?php

require_once(__DIR__.'/../../../lib/controller/ProductController.php');

$controller = new ProductController();

$ret = $controller->updateProduct($_POST['id'],$_POST['ref'], $_POST['brand'], $_POST['model'], $_POST['stock'], $_POST['description'], $_POST['dealer'], $_POST['price'], $_POST['dealerprice']);

$ref = $_POST['ref'];

$brand = $_POST['brand'];

$model = $_POST['model'];

$pageTitle = "Status Update $ref - $brand $model";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        <div class="col-md-12 jumbotron">
          <h1 class="text-center">Status Update <?= $brand . " " . $model ?></h1>
        </div>
        <div class="col-md-8">
<?php if ($ret==1){ ?>
          <h2 class="text-center">Update on <?= $ref . " - " . $brand . " " . $model ?> was succesful.</h2>
<?php } else { ?>
          <h2 class="text-center">There was a problem updating <?= $ref . " - " . $brand . " " . $model ?> .</h2>
<?php } ?>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Products</a></p>
          </blockquote>
          <blockquote>
            <p><a href="../detail.php?id=<?=$_GET['id']?>">Return to Details of the Product</a></p>
            <p><a href="delete.php?id=<?=$_GET['id']?>">Delete Product</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->