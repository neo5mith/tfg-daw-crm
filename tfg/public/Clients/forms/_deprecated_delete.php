<?php

require_once(__DIR__.'/../../../lib/controller/ClientController.php');

$controller = new ClientController();

$controller->deleteClient($_GET['id']);

$id = $_GET['id'];

$pageTitle = "Delete Status $id";

$type = "Clients";

?>
    
<?php include(__DIR__.'/../../resources/inc/header.php'); ?> <!--Header-->
        
        <div class="col-md-8">
          <h2 class="text-center"> Client with ID: <?= $_GET['id'] ?> was succesfully deleted.</h2>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
            <p><a href="../index.php">Return to Clients</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../../resources/inc/footer.php'); ?> <!--Footer-->