<?php
session_start();
if(isset($_GET['czysckoszyk']) ){
    if($_GET['czysckoszyk'] == "koszyk"){
      unset($_SESSION['idproduktu']);
      unset($_SESSION['cena']);
      unset($_SESSION['ilosc']);

      header('location:koszykedit.php');

    }
    if($_GET['czysckoszyk'] == "produkt"){
      $id = $_GET['id'];
    //unset($_SESSION['idproduktu'][1]);
    foreach($_SESSION['idproduktu'] as $key => $value) {
      if($_SESSION['idproduktu'][$key] == $id){
        unset($_SESSION['idproduktu'][$key]);
      }
    }
      echo "<pre>";
      print_r($_SESSION['idproduktu']);
      echo "</pre>";

    }

   }else{
      header('location:../index.php');
   }

 ?>
