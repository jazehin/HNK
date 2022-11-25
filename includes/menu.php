<?php

$content = "includes/mainpage.php";
if (isset($_GET["p"])) {
  switch ($_GET["p"]) {
    case 'all':
      $content = "includes/all.php";
      break;
    case 'abc':
      $content = "includes/abc.php";
      break;
    case 'kozseg':
      $content = "includes/jogallas.php";
      break;
    case 'nagykozseg':
      $content = "includes/jogallas.php";
      break;
    case 'varos':
      $content = "includes/jogallas.php";
      break; 
    case 'adatlap':
      $content = "includes/adatlap.php";
      break;
  }
}

?>