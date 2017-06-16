<?php

$pageTitle = "PRODUCTS DB";

$type = "Products";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?> <!--Header-->
      
      <div class="row">
        <div class="col-md-8">
          
          <h3>Insert Product</h3>
          </br>
          
          <form class="form-inline" action="forms/add.php" method="post">
            <div class="form-group">
              <label for="s1">Ref:</label>
              <input type="number" name="ref" tabindex="1" required>
            </div>
            <div class="form-group">
              <label for="s2">Brand:</label>
              <input type="text" name="brand" tabindex="2" required>
            </div>
            <div class="form-group">
              <label for="s2">Model:</label>
              <input type="text" name="model" tabindex="3" required>
            </div>
            <div class="form-group">
              <label for="s3">Stock:</label>
              <input type="number" name="stock" tabindex="4" required>
            </div>
            </br>
            <div class="form-group">
              <label for="s4">Description:</label>
              <input type="text" name="description" tabindex="5" required>
            </div>
            <div class="form-group">
              <label for="s5">Dealer:</label>
              <input type="text" name="dealer" tabindex="6" required>
            </div>
            <div class="form-group">
              <label for="s6">Price:</label>
              <input type="number" name="price" tabindex="7" step="0.01" required>
            </div>
            </br>
            <div class="form-group">
              <label for="s7">Dealer Price:</label>
              <input type="number" name="dealerprice" tabindex="8" step="0.01" required>
            </div>
            </br>
            <button class="btn btn-default" type="submit" tabindex="9">Add</button>
          </form>
        </div>
        
      </div>
      <div class="row">
        
        <div class="col-md-9">
          <h1 class="text-center">List of Products</h1>
<?php if ($stateDb==1){ ?>
          <table class="table table-bordered">
            <!-- Titols de les columnes -->
            <tr><th class="text-center">Id</th><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Details</th><th class="text-center">Update Details</th><th class="text-center">Delete</th></tr>
            <!-- Foreach per anar iterant sobre el llistat i anar treient totes les dades -->
<?php foreach ($dataBase as $prod){ ?>
            <tr>
              <td class="text-center"><a href="detail.php?id=<?= $prod->getId() ?>"><?=$prod->getId()?></a></td>
              <td class="text-center"><?= $prod->getRef() ?></td>
              <td class="text-center"><?= $prod->getBrand() ?></td>
              <td class="text-center"><?= $prod->getModel() ?></td>
              <td class="text-center"><?= $prod->getStock() ?></td>
              <td class="text-center"><a type="button" class="btn btn-primary" href="detail.php?id=<?= $prod->getId() ?>">View details</a></td>
              <td class="text-center"><a type="button" class="btn btn-primary" href="update.php?id=<?= $prod->getId() ?>">Update details</a></td>
              <td class="text-center"><a type="button" class="btn btn-danger" id="del" href="forms/delete.php?id=<?= $prod->getId() ?>">Delete</a></td>
            </tr>
<?php } ?>
          </table>
<?php } elseif ($stateDb==0){ ?>
          <h2 class="text-center">There is no data from the DataBase.</h2>
<?php } else { ?>
          <h2 class="text-center">There was a problem processing the data from MYSQL.</h2>
<?php } ?>
        </div>
        
        <div class="col-md-3 text-center">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
      </div>

<?php include(__DIR__.'/../resources/inc/footer.php'); ?> <!--Footer-->