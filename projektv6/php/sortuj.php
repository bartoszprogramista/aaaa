<?php
   if(isset($_GET['co']) && isset($_GET['jak']) && isset($_GET['kategoria'])){
      $co = $_GET['co'];
      $jak = $_GET['jak'];
      $kategoria = $_GET['kategoria'];
      echo $co;
      echo $jak;
      header("location:podstrona.php?kategoria=$kategoria&co=$co&jak=$jak");





   }else{
      //header('location:../index.php');
   }













 ?>
