<?php

require_once(__DIR__.'/../../../lib/controller/ClientController.php');

$controller = new ClientController();

$stat = $controller->addClient($_POST['dni'], $_POST['name'], $_POST['surname'], $_POST['address'], $_POST['city'], $_POST['country'], $_POST['phone'], $_POST['mail']);

$nameSur = $_POST['name'] . " " . $_POST['surname'];

$dni = $_POST['dni'];

$pageTitle = "Add Status - $nameSur";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        
        <div class="col-md-12 jumbotron">
          <h1 class="text-center">Add Status - <?= $nameSur ?></h1>
        </div>
        
        <div class="col-md-8">
          <h2 class="text-center"> <?= $nameSur ?> with DNI <?= $dni ?> was succesfully added.</h2>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Clients</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->