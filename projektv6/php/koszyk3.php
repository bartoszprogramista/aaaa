<?php
   session_start();
   if(!isset($_SESSION['idproduktu'])){
      $_SESSION['idproduktu'] = array();
      $_SESSION['ilosc'] = array();
   }
   if(isset($_SESSION['zalogowany'])){
      $idproduktu = $_GET['idproduktu'];
         if(isset($_GET['dodaj']) && isset($_GET['idproduktu'])){
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
            header("location:../index.php");
   }else{
          header("location:../index.php");

      }

}else{
   $_SESSION['zamowienielog'] = "Aby zakupić produkt musisz się zalogowac";

   header("location:../index.php");
}





?>
