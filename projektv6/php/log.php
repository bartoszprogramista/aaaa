<?php
   session_start();

 ?>


 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Projekt</title>
         <script src="../../jQuery/jquery-3.2.1.min.js"></script>
         <link rel="stylesheet" href="../css/style.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     </head>
     <body>
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

                            <form class="navbar-form navbar-center" action="szukaj.php">
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
                               <li><a href="log.php">Zaloguj się </a></li>
                            </ul>
LOGIN;
                         }else{

                            echo <<<XD
                            <ul class="nav navbar-nav navbar-right">
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$_SESSION['login']} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="log.php?zamowienia=">Historia zamówień</a></li>
                                  <li><a href="log.php">Twoje dane</a></li>
                                  <li class="divider"></li>
                                  <li><a href="logout.php?wyloguj=xd">Wyloguj się</a></li>
                               </ul></li>
                            </ul>
XD;
                         }
                       ?>
                </div>
             </div>
          <div class="row">
             <div class="col-lg-2" id="lewo">
                <div class="list-group">

                   <a class="list-group-item" href="../index.php" >Strona główna</a>
                   <li class="list-group-item"><b>Podzespoły: </b></li>
                   <a  class="list-group-item" href="podstrona.php?kategoria=procesor">Procesory</a>
                   <a  class="list-group-item" href="podstrona.php?kategoria=ram">Pamięć RAM</a>
                   <a  class="list-group-item" href="podstrona.php?kategoria=moba">MOBA</a>
                   <a class="list-group-item"  href="podstrona.php?kategoria=gpu">GPU</a>
                   <a class="list-group-item"  href="podstrona.php?kategoria=zasilacz">Zasilacz</a>
                   <a  class="list-group-item" href="podstrona.php?kategoria=hdd">Pamięć HDD</a>
                   <a class="list-group-item" href="kontakt.php"> Kontakt</a></li>


             </div>
          </div>



          <div class="row">
               <?php

               if(!isset($_SESSION['zalogowany'])){
                  if(!isset($_GET['rejestracja'])){
                     echo <<<FORM
                     <div class="col-lg-12" id="prawo" >

                        <form action="sprawdzenie.php" method="post" class="form-horizontal">
                           <fieldset>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="textinput">Login</label>
                              <div class="col-md-4">
                                 <input type="text" name="login" class="form-control input-md" id="login">
                              </div>
                           </div>
                            <div class="form-group">
                               <label class="col-md-4 control-label" for="textinput">Hasło</label>
                               <div class="col-md-4">
                                  <input type="password" name="pass" class="form-control input-md" id="haslo">
                              </div>
                            </div>
                            <center><button name="przycisk" class="btn btn-primary">Zaloguj</button></center>
                           </fieldset>
                        </form>
                        <center><p><a href="log.php?rejestracja=true">Nie masz konta? Zarejestruj się!</a></p></center>
                     </div>
FORM;

               }else{
                  echo "<div class=\"col-lg-12\" id=\"prawo\" >";
                  if(isset($_SESSION['bladr'])){
                     echo "<div class=\"alert alert-danger\">{$_SESSION['bladr']}</div>";
                     unset($_SESSION['bladr']);
                  }elseif(isset($_SESSION['rejestracjagut'])){
                     echo "<div class=\"alert alert-success\">{$_SESSION['rejestracjagut']}</div>";
                     unset($_SESSION['rejestracjagut']);
                  }elseif(isset($_SESSION['istnieje'])){
                     echo "<div class=\"alert alert-danger\">{$_SESSION['istnieje']}</div>";
                     unset($_SESSION['istnieje']);
                  }else{
                     echo "<div id=\"komunikat\" class=\"alert alert-danger\"></div>";
                  }


                  echo<<<FORM


                  <form method="post" action="rejestracja.php" class="form-horizontal">
                     <fieldset>
                        <div class="form-group">
                           <label class="col-md-4 control-label" for="textinput">Login</label>
                           <div class="col-md-4">
                              <input type="text" name="login" class="form-control input-md" id="login">
                         </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Hasło</label>
                            <div class="col-md-4">
                               <input type="password" name="haslo" class="form-control input-md" id="haslo">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Imię</label>
                            <div class="col-md-4">
                               <input type="text" name="imie" class="form-control input-md" id="imie">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Nazwisko</label>
                            <div class="col-md-4">
                               <input type="text" name="nazwisko" class="form-control input-md" id="nazwisko">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">E-mail</label>
                            <div class="col-md-4">
                               <input type="text" name="email" class="form-control input-md" id="email">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Miasto</label>
                            <div class="col-md-4">
                               <input type="text" name="miasto" class="form-control input-md" id="miasto">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Adres</label>
                            <div class="col-md-4">
                               <input type="text" name="adres" class="form-control input-md" id="adres">
                           </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Telefon</label>
                            <div class="col-md-4">
                               <input type="text" name="telefon" class="form-control input-md" id="telefon">
                           </div>
                         </div>

                           <center><button name="przycisk" class="btn btn-primary">Stwórz konto</button></center>
                     </fieldset>
                  </form>
               </div>
FORM;
               }

            }else{
               if(!isset($_SESSION['zalogowany'])){
                  header('location:../index.php');
               }else{
                  $polaczenie = new mysqli('localhost', 'root', '', 'sklep_internetowy');
                  $polaczenie->set_charset("utf8");
                  $sql = "select * from klienci where idklienta = {$_SESSION['idklienta']}";
                  if($rezultat = $polaczenie->query($sql)){
                     while($wiersz = $rezultat->fetch_assoc()){

                        $login = $polaczenie->real_escape_string(htmlentities($wiersz['login']));
                        $haslo = $polaczenie->real_escape_string(htmlentities($wiersz['haslo']));
                        $imie = $polaczenie->real_escape_string(htmlentities($wiersz['imie']));
                        $nazwisko = $polaczenie->real_escape_string(htmlentities($wiersz['nazwisko']));
                        $email = $polaczenie->real_escape_string(htmlentities($wiersz['email']));
                        $miasto = $polaczenie->real_escape_string(htmlentities($wiersz['miasto']));
                        $adres = $polaczenie->real_escape_string(htmlentities($wiersz['adres']));
                        $telefon = $polaczenie->real_escape_string(htmlentities($wiersz['telefon']));
                     }


                  if(isset($_GET['zamowienia'])){
                     echo <<<ZAMOWIENIE
                     <div class="col-lg-12" id="prawo" >
                        <ul class="nav nav-tabs">
                        <li role="presentation" ><a href="log.php">Twoje dane</a></li>
                        <li role="presentation"><a href="log.php?zmien=haha">Zmień dane</a></li>
                        <li class="active" role="presentation"><a href="log.php?zamowienia=tam">Historia zamówień</a></li>
                       </ul>





ZAMOWIENIE;

            $idklienta = $_SESSION['idklienta'];

$cenahistoria = 0;
$polaczenie = new mysqli('localhost','root','','sklep_internetowy');
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
         @$cenahistoria = $cenahistoria + ($wiersz2['ilosc']*$wiersz2['cena']);
         echo <<<ZAMOWIENIE
            <tr>
               <td>{$wiersz2['nazwaproduktu']}</td>
               <td>{$wiersz2['ilosc']}</td>
               <td>{$wiersz2['cena']} zł</td>

            </tr>

ZAMOWIENIE;

      }

      echo <<<ENDTABLE
         <tr>
            <td>Łączna cena </td>
            <td>$cenahistoria zł</td>
         </tr>
      </table>
ENDTABLE;

      }
   }

                  echo "</div>";

                }elseif(isset($_GET['zmien'])){

                     echo <<<WYLOGUJ
                     <div class="col-lg-12" id="prawo" >
                        <ul class="nav nav-tabs">
                        <li  role="presentation" ><a href="log.php">Twoje dane</a></li>
                        <li class="active"  role="presentation"><a href="log.php?zmien=haha">Zmień dane</a></li>
                        <li  role="presentation"><a href="log.php?zamowienia=tam">Historia zamówień</a></li>
                       </ul>
WYLOGUJ;
                      echo "<div id=\"komunikat\" class=\"alert alert-danger\"></div>";
                      if(isset($_SESSION['bladr'])){
                        echo "<div class=\"alert alert-danger\" id=\"komunikat\">{$_SESSION['bladr']}</div>";
                        unset($_SESSION['bladr']);
                      }
                      echo <<<WYLOGUJ
                        <form method="post" action="logout.php" class="form-horizontal">
                           <fieldset>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="textinput">Login</label>
                                 <div class="col-md-4">
                                    <input type="text" id="login" name="login" class="form-control input-md" value="$login">
                               </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Hasło</label>
                                  <div class="col-md-4">
                                     <input type="password" id="haslo" name="haslo" class="form-control input-md" value="$haslo">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Imię</label>
                                  <div class="col-md-4">
                                     <input type="text"  id="imie" name="imie" class="form-control input-md" value="$imie">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Nazwisko</label>
                                  <div class="col-md-4">
                                     <input type="text"  id="nazwisko" name="nazwisko" class="form-control input-md" value="$nazwisko">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">E-mail</label>
                                  <div class="col-md-4">
                                     <input type="text"  id="email" name="email" class="form-control input-md" value="$email">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Miasto</label>
                                  <div class="col-md-4">
                                     <input type="text" id="miasto" name="miasto" class="form-control input-md" value="$miasto">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Adres</label>
                                  <div class="col-md-4">
                                     <input type="text"  id="adres" name="adres" class="form-control input-md" value="$adres">
                                 </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Telefon</label>
                                  <div class="col-md-4">
                                     <input type="text" id="telefon" name="telefon" class="form-control input-md" value="$telefon">
                                 </div>
                               </div>

                                 <center><button id="zmien" name="zmien" class="btn btn-primary">Zmień dane</button></center>
                           </fieldset>
                        </form>

                  </div>
WYLOGUJ;
                  }
                  else{
                     echo <<<LOL
                     <div class="col-lg-12" id="prawo">
                        <ul class="nav nav-tabs">
                        <li class="active" role="presentation" ><a href="log.php">Twoje dane</a></li>
                        <li role="presentation"><a href="log.php?zmien=haha">Zmień dane</a></li>
                        <li  role="presentation"><a href="log.php?zamowienia=jazda">Historia zamówień</a></li>
                      </ul>
                      <div class="row">
                        <div class="col-lg-8 col-md-8 col-md-12">
                            <div class="panel panel-default" style="text-align:center !important;">

                              <div class="panel-heading">Twoje dane</div>
                              <table class="table">
                                  <tr>
                                    <td>Login :</td>
                                    <td>$login</td>
                                 </tr>
                                 <tr>
                                   <td>Hasło :</td>
                                   <td>*****</td>
                                </tr>
                                <tr>
                                  <td>Imię :</td>
                                  <td>$imie</td>
                              </tr>
                              <tr>
                                <td>Nazwisko :</td>
                                <td>$nazwisko</td>
                             </tr>
                             <tr>
                              <td>Email :</td>
                              <td>$email</td>
                           </tr>
                           <tr>
                             <td>Miasto :</td>
                             <td>$miasto</td>
                           </tr>
                           <tr>
                              <td>Adres :</td>
                              <td>$adres</td>
                           </tr>
                           <tr>
                             <td>Telefon :</td>
                             <td>$telefon</td>
                           </tr>

                              </table>
                           </div>

                        </div>
                     </div>


                     <div id="komunikat"></div>
                  </div>
LOL;

                  }



                     $polaczenie->close();
                }
                  if(isset($_POST['wyloguj'])){
                     unset($_SESSION['zalogowany']);
                     session_destroy();
                     header('location:log.php');
                  }

               }

            }

                ?>
               <?php
                  if(isset($_SESSION['blad'])){
                     echo $_SESSION['blad'];
                  }

                ?>
         </div>
         <?php
            if(isset($_SESSION['zalogowany'])){
               echo <<<KOSZYK
                  <a href="koszykedit.php" class="btn btn-info btn-lg" id="koszyk">
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
                           <p><a href="#!">Regulamin sklepu</a></p>
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

      <script src="../js/regEx.js"></script>
      <script src="../js/script.js"></script>
   </body>
</html>
