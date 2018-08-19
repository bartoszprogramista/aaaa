<?php
session_start();

if(isset($_GET['wyslijzamowienie'])){
   $polaczenie = new mysqli('localhost', 'root', '','sklep_internetowy');
   if($polaczenie->connect_errno){
      echo "blad połaczenia";
   }else{

      $idklienta =  $_SESSION['idklienta'];


      $sql1 = "INSERT INTO `zamowienia` (`idzamowienia`, `idklienta`, `datazamowienia`) VALUES (NULL, '$idklienta', NULL)";
      $rezultat = $polaczenie->query($sql1);

      $sql2 = "SELECT idzamowienia FROM zamowienia WHERE idklienta = $idklienta ORDER BY idzamowienia DESC LIMIT 1";
      $rezultat1 = $polaczenie->query($sql2);
      $wiersz = $rezultat1->fetch_row();
      $idzamowienia = $wiersz[0];


      foreach ($_SESSION['xd'] as $key => $value) {
         $id = $_SESSION['xd'][$key];
         $rezultat = $polaczenie->query($sql);

            $sql3 = "SELECT * FROM produkt WHERE idproduktu = ".$_SESSION['xd'][$key];
            $id = $_SESSION['xd'][$key];
            $rezultat = $polaczenie->query($sql3);
               while($wiersz = $rezultat->fetch_assoc()){
                  $sql4 = "INSERT INTO `zamowienia_szczegoly` (`idzamowienia`, `idproduktu`, `ilosc`, `cena`) VALUES ($idzamowienia, {$wiersz['idproduktu']}, {$_SESSION['ilosc'][$id]}, {$wiersz['cena']})";
                  $rezultat2 = $polaczenie->query($sql4);
                  $sql5 = "update magazyn set magazyn.dostepnailosc = magazyn.dostepnailosc - {$_SESSION['ilosc'][$id]} where idproduktu = {$wiersz['idproduktu']}";
                  $rezultat333 = $polaczenie->query($sql5);
            }
      }

      $_SESSION['zamowiono'] = "Produkty zostały zamówione";
      unset($_SESSION['idproduktu']);
      unset($_SESSION['cena']);
      unset($_SESSION['ilosc']);
      header('location:koszykedit.php');

   $polaczenie->close();
   }

}else{
  header("location:../index.php");
}
?>
