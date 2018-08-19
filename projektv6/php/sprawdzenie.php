<?php
   session_start();
   if(isset($_POST['przycisk']) && !empty($_POST['login']) && !empty($_POST['pass'])){
      if($polaczenie = new mysqli('localhost','root','','sklep_internetowy')){
         $login = $polaczenie->real_escape_string(htmlentities($_POST['login']));
         $pass = $polaczenie->real_escape_string(htmlentities($_POST['pass']));
         $sql = "SELECT idklienta,login,haslo FROM klienci where login = '$login' and haslo = '$pass'";
         if($rezultat = $polaczenie->query($sql)){
            if($rezultat->num_rows > 0){
               while($wiersz = $rezultat->fetch_assoc()){
                  $_SESSION['idklienta'] = $wiersz['idklienta'];
               }
               $_SESSION['zalogowany'] = true;
               $_SESSION['login'] = $login;

               unset($_SESSION['blad']);

            }
            $polaczenie->close();
            header('location:log.php');
         }else{
            $_SESSION['blad'] = "Nieprawidłowe zapytanie";
            header('location:log.php');
         }
      }else{
         $_SESSION['blad'] = "Nieprawidłowe połączenie";
         header('location:log.php');
      }
   }else{
      $_SESSION['blad'] = "Nieprawidłowe dane";
      header('location:log.php');
   }






 ?>
