<?php

require_once(__DIR__.'/../../../lib/controller/ClientController.php');

$controller = new ClientController();

$ret = $controller->updateClient($_POST['id'],$_POST['dni'], $_POST['name'], $_POST['surname'], $_POST['address'], $_POST['city'], $_POST['country'], $_POST['phone'], $_POST['email']);

$nameSur = $_POST['name'] . " " . $_POST['surname'];

$pageTitle = "Status Update - $nameSur";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        
        <div class="col-md-8">
<?php if ($ret==1){ ?>
          <h2 class="text-center">Update on <?= $nameSur ?> was succesful.</h2>
<?php } else { ?>
          <h2 class="text-center">There was a problem updating <?= $nameSur ?> .</h2>
<?php } ?>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Clients</a></p>
          </blockquote>
          <blockquote>
            <p><a href="detail.php?id=<?=$_GET['id']?>">Return to Details of the Client</a></p>
            <p><a href="delete.php?id=<?=$_GET['id']?>">Delete Client</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->