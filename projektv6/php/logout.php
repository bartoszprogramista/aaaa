<?php
   session_start();
   if(!isset($_SESSION['zalogowany'])){
      header('location:../index.php');
   }else{

      if(isset($_POST['wyloguj']) || isset($_GET['wyloguj'])){

         unset($_SESSION['zalogowany']);
         session_destroy();
         header('location:log.php');
      }
      if(isset($_POST['zmien'])){
         if(!empty($_POST['login'])
            && !empty($_POST['haslo'])
            && !empty($_POST['imie'])
            && !empty($_POST['nazwisko'])
            && !empty($_POST['email'])
            && !empty($_POST['miasto'])
            && !empty($_POST['adres'])
            && !empty($_POST['telefon'])
      ){
            $polaczenie = new mysqli('localhost', 'root', '', 'sklep_internetowy');

            if($polaczenie->connect_errno){
               header('location:log.php');
            }else{
            $polaczenie->set_charset("utf8");
            $login = $polaczenie->real_escape_string(htmlentities($_POST['login']));
            $haslo = $polaczenie->real_escape_string(htmlentities($_POST['haslo']));
            $imie = $polaczenie->real_escape_string(htmlentities($_POST['imie']));
            $nazwisko = $polaczenie->real_escape_string(htmlentities($_POST['nazwisko']));
            $email = $polaczenie->real_escape_string(htmlentities($_POST['email']));
            $miasto = $polaczenie->real_escape_string(htmlentities($_POST['miasto']));
            $adres = $polaczenie->real_escape_string(htmlentities($_POST['adres']));
            $telefon = $polaczenie->real_escape_string(htmlentities($_POST['telefon']));
            $idklienta = $_SESSION['idklienta'];
            $sql = "UPDATE `klienci` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `login` = '$login', `miasto` = '$miasto', `adres` = '$adres', `telefon` = '$telefon', `email` = '$email', `haslo` = '$haslo' WHERE idklienta = ";
            $sql = $sql.$idklienta;

            $rezultat = $polaczenie->query($sql);
            $polaczenie->close();
            header('location:log.php');
         }
      }else{
         header('location:log.php');
      }
      }




      }



 ?>
