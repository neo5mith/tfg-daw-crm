<!--Llistat de orders ja creades-->

<!--Per afegir productes, fer consulta a la MySql, i agafar la id del producte. Un cop es confirma la comanda, agafar totes les dades del producte-->

<!--Per afegir el client igual, primer agafar el Nom, Cognom - id i despres agafar tota la seva info-->

<!--{-->
<!--    "_id" : 1675765767567576r56,-->
<!--    "totalPrice" : "150.45",-->
<!--    "buyDate" : "timestamp",-->
<!--    "client" : {"id" : "000001", "dni" : "52148552H", "name" : "Max", "surname" : "Cooper", "address" : "Street of Columbia n32",-->
<!--        "city" : "Barcelona", "country" : "Spain", "phone" : "93678331285", "mail" : "maxcooper@gmail.com"},-->
<!--    "products" : [{quantity:2,linePrice:347632,...}, {quantity:23}],-->
<!--}-->

<?php

$pageTitle = "Orders DB";

$type = "Orders";

?>
    
<?php include(__DIR__.'/../resources/inc/header.php'); ?>

     <div class="row">
        
        <div class="col-md-8">
          <h2 class="text-center">whatever</h2>
        </div>
        
        <div class="col-md-4">
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
        </div>
        
      </div>
  
<?php include(__DIR__.'/../resources/inc/footer.php'); ?>