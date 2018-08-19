<?php
session_start();
if(!isset($_SESSION['idproduktu'])){
   $_SESSION['idproduktu'] = array();
   $_SESSION['ilosc'] = array();
}
if(isset($_SESSION['zalogowany'])){
   $idproduktu = $_GET['idproduktu'];
      if(isset($_GET['szukaj'])){
         $szukaj = $_GET['szukaj'];
         $_SESSION['cena'] = $_SESSION['cena']+$_GET['dodaj'];
         echo $_SESSION['cena'];
         echo "<br>";

         $j = 1;
         array_push($_SESSION['idproduktu'], $idproduktu);

         for($i = 0; $i<count($_SESSION['idproduktu']); $i++){
            if($_SESSION['idproduktu'][$i] == $idproduktu){
               $_SESSION['ilosc'][$idproduktu] = $j++;
            }
         }


         echo '<pre>';
         print_r($_SESSION['idproduktu']);
         print_r($_SESSION['ilosc']);
         echo '</pre>';
         header("location:szukaj.php?szukaj=$szukaj");
      }else{
          header("location:../index.php");

      }
}else{
   $szukaj = $_GET['szukaj'];
   echo $szukaj;
   $_SESSION['zamowienielog'] = "Aby zamówić produkt musisz się zalogować";
   header("location:szukaj.php?szukaj=$szukaj");
}

?>
