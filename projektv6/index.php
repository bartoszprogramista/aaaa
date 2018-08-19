<?php
   session_start();
   if(isset($_SESSION['blad'])){
      unset($_SESSION['blad']);
   }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projekt</title>
        <script src="../jQuery/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

        <script>
        var numer = 0;
        var timer1 = 0;
        var timer2 = 0;
        function schowaj()
        {
           $("#slider").fadeOut(500);
        }
        function zmienslajd()
        {
           numer++; if (numer>2) numer=1;
           var plik = "<img src=\"php/pliki/baner" + numer + ".jpg\" class=\"img-responsive\" style=\"margin-left:auto; margin-right:auto;\"/>";
           document.getElementById("slider").innerHTML = plik;
           $("#slider").fadeIn(500);
           timer1 = setTimeout("zmienslajd()", 15000);
           timer2 = setTimeout("schowaj()", 14500);
        }
        </script>
    </head>
    <body onload="zmienslajd()">
      <div class="cointainer">
         <div class="page-header" id="header">
            <div>Sklep internetowy</div>
         </div>
      <div class="row">

               <div class="navbar navbar-inverse navbar-fixed">

                     <div class="col-lg-3">

                        <div class="navbar-header" id="pierwszy">
                           <a class="navbar-brand" href="">Menu</a>
                        </div>
                     </div>
                     <div class="col-lg-6" id="formstyl">
                     <?php
echo <<<INPUT

                           <form class="navbar-form navbar-center" action="php/szukaj.php">
                              <div class="form-group">
                                 <span style="color:white;"> Wpisz szukany przedmiot </span><input class="form-control" type="text" name="szukaj">
                              </div>
                              <input class="btn btn-default" type="submit" name="dawai"  >
                           </form>

INPUT;
                     ?>
                  </div>
                     <?php
                        if(!isset($_SESSION['zalogowany'])){
//nav navbar-nav navbar-right
                           echo <<<LOGIN
                           <ul class="nav navbar-nav navbar-right">
                              <li><a href="php/log.php">Zaloguj się </a></li>
                           </ul>
LOGIN;
                        }else{
                           //echo "<div class=\"col-lg-3\"><a href=\"php/log.php\"><ul class=\"nav navbar-nav navbar-right\"> Zaloguj</ul></a></div>";
                           echo <<<XD
                           <ul class="nav navbar-nav navbar-right">
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$_SESSION['login']} <span class="caret"></span></a>
                               <ul class="dropdown-menu" role="menu">
                                 <li><a href="php/log.php?zamowienia=">Historia zamówień</a></li>
                                 <li><a href="php/log.php">Twoje dane</a></li>
                                 <li class="divider"></li>
                                 <li><a href="php/logout.php?wyloguj=xd">Wyloguj się</a></li>
                              </ul></li>
                           </ul>
XD;
                        }
                      ?>
               </div>
            </div>






         <div class="row" >
            <div class="col-lg-2" id="lewo">
               <div class="list-group">

                  <a class="list-group-item" href="index.php" >Strona główna</a>
                  <li class="list-group-item"><b>Podzespoły: </b></li>
                  <a  class="list-group-item" href="php/podstrona.php?kategoria=procesor">Procesory</a>
                  <a  class="list-group-item" href="php/podstrona.php?kategoria=ram">Pamięć RAM</a>
                  <a  class="list-group-item" href="php/podstrona.php?kategoria=moba">MOBA</a>
                  <a class="list-group-item"  href="php/podstrona.php?kategoria=gpu">GPU</a>
                  <a class="list-group-item"  href="php/podstrona.php?kategoria=zasilacz">Zasilacz</a>
                  <a  class="list-group-item" href="php/podstrona.php?kategoria=hdd">Pamięć HDD</a>



            </div>
         </div>

            <div class="col-lg-12" id="prawo">
              <?php
              if(isset($_SESSION['szukajblad'])){
                echo "<div class=\"alert alert-danger\">{$_SESSION['szukajblad']}</div>";
                unset($_SESSION['szukajblad']);
              }


               ?>
               <h1>Polecane produkty</h1>
               <h3>Już teraz kup najlepsze gamingowe podzespoły. Zobacz co rekomendują nasi eksperci by móc rywalizować na najwyższym poziomie</h3>
               <br>
               <!-- <img  class="img-responsive" style=" margin-left:auto;margin-right:auto;" id="banerdosia"> -->
               <div id="slider"></div>
               <br>
               <br>
               <hr size="10" style="background-color:black; height:1px;">
               <?php


                  $polaczenie = new mysqli('localhost','root','','sklep_internetowy');
                  $sql = "SELECT * FROM produkt inner join magazyn on produkt.idproduktu = magazyn.idproduktu where produkt.idproduktu IN(9,12,8)";
                  $rezultat = $polaczenie->query($sql);
                  while($wiersz = $rezultat->fetch_assoc()){
                     $photo = $wiersz['link'];
                     $cena = $wiersz['cena'];
                     $idproduktu = $wiersz['idproduktu'];
                     echo<<<XD
                     <div class="produkt">
                        <div class="zdjecie">
                           <img src="php/$photo" id="produkt" class="linkzdj">
                        </div>
                        <div class="info">
                           {$wiersz['nazwaproduktu']} | {$wiersz['cena']}zł<br>
XD;
                        if($wiersz['dostepnailosc'] <= 0){
                           echo "Produkt wyprzedany";
                        }else{
                           echo "Liczba produktów w magazynie: {$wiersz['dostepnailosc']}<br>";
                           echo "<a href=\"php/koszyk3.php?dodaj=$cena&idproduktu=$idproduktu\"> Dodaj do koszyka</a><br>";

                        }

                        echo <<<HAHA
                        </div>
                        <div style="clear:both;"></div>
                     </div>
                     <hr size="10" style="background-color:black; height:1px;">

HAHA;
                  }

               ?>
            </div>
         </div>

            <?php
               if(isset($_SESSION['zalogowany'])){
                  echo <<<KOSZYK
                     <a href="php/koszykedit.php" class="btn btn-info btn-lg" id="koszyk">
                     <span class="glyphicon glyphicon-shopping-cart"></span> Dawai<br>

KOSZYK;
                     if(isset($_SESSION['cena'])){
                        echo "{$_SESSION['cena']} ZŁ<br>";

                     }
                     echo "</a>";
                  }
            ?>


            <div class="row">
               <div class="col-lg-12" id="stopka">

                        <div class="footer">
                              <div class="col-lg-4 ">
                                  <h6 class="title mb-4 font-bold">O nas</h6>
                                  <p>Sklep internetowy: zajmujemy się sprzedażą podzespołów komuterowych w Polsce. Cośtam jeszcze więcej o sklepie. Wykonał: Bartosz Kośmider kl.4Te</p>
                                  <p> &copy; 2017</p>
                              </div>
                              <div class="col-lg-4 ">
                                  <h6 class="title mb-4 font-bold">Informacje</h6>
                                  <p><a href="php/pliki/regulamin.pdf">Regulamin sklepu</a></p>
                              </div>
                              <div class="col-lg-4 ">
                                  <h6 class="title mb-4 font-bold">Kontakt:</h6>
                                  <p> Telefon: xxxxxxxxx</p>
                                  <p> E-mail: bartekkosmider123@gmail.com</p>
                                  <p>Adres: Dębno </p>
                              </div>
                        </div>

               </div>
            </div>
      </div>
 <script src="js/script.js"></script>
    </body>
</html>
