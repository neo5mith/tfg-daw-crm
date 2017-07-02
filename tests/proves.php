<?php

$pageTitle = "PROVES";

$type = "";

?>
    
<?php include(__DIR__.'/resources/inc/header.php'); ?> <!--Header-->

<div class="col-md-8">
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>Select image to upload:</h3>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button class="btn btn-success" type="submit" name="submit">Upload</button>
    </form>
    
</div>


<div class="col-md-3 text-center">
    
          <blockquote>
            <p><a href="/index.php">Return to DashBoard</a></p>
          </blockquote>
          
</div>

<?php include(__DIR__.'/resources/inc/footer.php'); ?> <!--Footer-->