<?php

if(isset($_SESSION['zalogowany'])){
   $idklienta = $_SESSION['idklienta'];
   $cenahistoria = 0;

   $polaczenie = new mysqli('localhost','root','','sklep_internetowy');
   //$sql = select * from zamowienia_szczegoly inner join zamowienia on zamowienia_szczegoly.idzamowienia = zamowienia.idzamowienia inner join klienci on zamowienia.idklienta = klienci.idklienta where klienci.idklienta = 1
   $sql = "SELECT * from zamowienia where idklienta = $idklienta";
   $rezultat  = $polaczenie->query($sql);
   while($wiersz = $rezultat->fetch_assoc())
   {
      @$idzamowienia = $polaczenie->real_escape_string(htmlentities($_GET['szczegoly']));
      echo "<b>Zamówienie nr:</b> {$wiersz['idzamowienia']} Data zamówienia: {$wiersz['datazamowienia']}<br>";
      echo "<a href=\"log.php?zamowienia=&szczegoly={$wiersz['idzamowienia']}\">Szczegóły zamówienia</a><br>";

         if(isset($_GET['szczegoly']) && $idzamowienia == $wiersz['idzamowienia']){
            $sql2 = "select * FROM zamowienia_szczegoly inner join produkt on zamowienia_szczegoly.idproduktu = produkt.idproduktu where zamowienia_szczegoly.idzamowienia = $idzamowienia";
            $rezultat2 = $polaczenie->query($sql2);
            echo <<<TABLE
            <table class="table">
                <tr>
                   <th>Produkt </th>
                   <th>Ilość</th>
                   <th>Cena</th>
               </tr>

TABLE;
            while($wiersz2 = $rezultat2->fetch_assoc()){
               $cenahistoria = $cenahistoria + ($wiersz2['ilosc']*$wiersz2['cena']);
               echo <<<ZAMOWIENIE
                  <tr>
                     <td>{$wiersz2['nazwaproduktu']}</td>
                     <td>{$wiersz2['ilosc']}</td>
                     <td>{$wiersz2['cena']}</td>

                  </tr>

ZAMOWIENIE;

            }

            echo <<<ENDTABLE
               <tr>
                  <td>Łączna cena </td>
                  <td>$cenahistoria</td>
               </tr>
            </table>
ENDTABLE;

            }

         unset($_GET['szczegoly']);


   }

}else{
   header('location:../index.php');
}
 ?>
