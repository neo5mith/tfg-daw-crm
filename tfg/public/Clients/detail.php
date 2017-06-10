<?php

require_once(__DIR__.'../../../lib/controller/ClientController.php');

session_start();

$controller = new ClientController();

$det = $controller->getDetails($_GET['id']);

$details = $det[0];

$estatOp = $det[1];

$namSur = $details->getName() . ' ' . $details->getSurname();

$pageTitle = "Details of Client - $namSur";

$type = "Clients";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->

      <div class="row">
        
        <div class="col-md-8">
          <p><b>Id:</b> <?= $details->getId() ?></p>
          <p><b>Dni:</b> <?= $details->getDni() ?></p>
          <p><b>Name:</b> <?= $details->getName() ?></p>
          <p><b>Surname:</b> <?= $details->getSurname() ?></p>
          <p><b>Address:</b> <?= $details->getAddress() ?></p>
          <p><b>City:</b> <?= $details->getCity() ?></p>
          <p><b>Country:</b> <?= $details->getCountry() ?></p>
          <p><b>Phone:</b> <?= $details->getPhone() ?></p>
          <p><b>Mail:</b> <?= $details->getMail() ?></p>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="index.php">Return to Clients</a></p>
          </blockquote>
          <blockquote>
            <p><a href="update.php?id=<?=$_GET['id']?>">Modify Details of the Client</a></p>
            <p><a href="delete.php?id=<?=$_GET['id']?>">Delete Client</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->