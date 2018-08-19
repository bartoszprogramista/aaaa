
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
              <script src="../../jQuery/jquery-3.2.1.min.js"></script>
              <script src="../js/script.js"></script>
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



                  </div>
               </div>

                  <div class="col-lg-12" id="prawo">
                     <?php
                     if(isset($_GET['szukaj'])){
                        if(isset($_SESSION['zamowienielog'])){
                          echo "<div class=\"alert alert-danger\">{$_SESSION['zamowienielog']}</div>";
                           unset($_SESSION['zamowienielog']);
                        }


                        $szukaj = $_GET['szukaj'];
                        $polaczenie = new mysqli('localhost','root', '','sklep_internetowy');
                        if(!$polaczenie->connect_errno){
                           $sql = "SELECT * FROM produkt inner join magazyn on produkt.idproduktu = magazyn.idproduktu where nazwaproduktu Like '%$szukaj%'";


                           if($rezultat = $polaczenie->query($sql)){
                             if($rezultat->num_rows > 0){
                              while($wiersz = $rezultat->fetch_assoc()){
                                 $cena = $wiersz['cena'];
                                 $idproduktu = $wiersz['idproduktu'];
                                 $photo = $wiersz['link'];

                                 echo<<<XD
                                 <div class="produkt">
                                    <div class="zdjecie">
                                       <img src="$photo" id="produkt" class="linkzdj">
                                    </div>
                                    <div class="info">
                                       {$wiersz['nazwaproduktu']} | Cena: {$wiersz['cena']} zł<br>
XD;
                                       if($wiersz['dostepnailosc'] <=0){
                                          echo "Produkt wyprzedany";
                                       }else{
                                          echo "Liczba produktów w magazynie: {$wiersz['dostepnailosc']}<br>";
                                          echo "<a href=\"koszyk2.php?dodaj=$cena&idproduktu=$idproduktu&szukaj=$szukaj\"> Dodaj do koszyka</a><br>";
                                       }
                                       echo <<<HAHA
                                             </div>
                                             <div style="clear:both;"></div>
                                          </div>
                                          <hr size="10" style="background-color:black; height:1px;">
HAHA;

                              }
                           }else{
                              $_SESSION['szukajblad'] = "Nie znaleziono takiego produktu";
                              header("location:../index.php");
                           }
                         }else{
                           echo "XD";
                         }
                        $polaczenie->close();
                        }else{
                           $polaczenie->close();
                        }

                     }else{
                        header('location:../index.php');
                     }

               ?>


               </div>
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
                                        <p><a href="pliki/regulamin.pdf">Regulamin sklepu</a></p>
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
          </body>
      </html>
