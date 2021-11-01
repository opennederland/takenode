<?php

require_once(__DIR__.'/config/dependency_loader.php');

$id = $_GET['id'];
$db = Database::get_instance();

?>
<html lang="en">
  <head>
    <?php include 'parts/head-meta.php' ?>
    <title>TakeNode | Certificate</title>
  </head>
  <body>
    <div id="collapseCertificate">
      <div class="card card-body bg-greylight altfont">
        <?php require_once(__DIR__.'/parts/certificates/certificate.html.php') ?>
      </div>
    </div>
  </body>
</html>
