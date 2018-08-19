<?php
   session_start();

   if(isset($_POST['przycisk']) &&
   !empty($_POST['login']) &&
   !empty($_POST['haslo']) &&
   !empty($_POST['imie']) &&
   !empty($_POST['nazwisko']) &&
   !empty($_POST['email']) &&
   !empty($_POST['miasto']) &&
   !empty($_POST['adres']) &&
   !empty($_POST['telefon'])
      ){

         $polaczenie= new mysqli('localhost','root','','sklep_internetowy');
         $polaczenie->set_charset("utf8");
         if(!$polaczenie->connect_errno){
            echo $_POST['login'];

               $login = $polaczenie->real_escape_string(htmlentities($_POST['login']));
               $haslo = $polaczenie->real_escape_string(htmlentities($_POST['haslo']));
               $imie = $polaczenie->real_escape_string(htmlentities($_POST['imie']));
               $nazwisko = $polaczenie->real_escape_string(htmlentities($_POST['nazwisko']));
               $email = $polaczenie->real_escape_string(htmlentities($_POST['email']));
               $miasto = $polaczenie->real_escape_string(htmlentities($_POST['miasto']));
               $adres = $polaczenie->real_escape_string(htmlentities($_POST['adres']));
               $telefon = $polaczenie->real_escape_string(htmlentities($_POST['telefon']));

               $sql2 = "SELECT * from klienci where login LIKE '$login' OR email Like '$email' ";
               $rezultat2 = $polaczenie->query($sql2);
               if(!$rezultat2->num_rows > 0)
               {

                  echo "dodaje usera";
                  $sql = "INSERT INTO `klienci` VALUES (default, '$imie', '$nazwisko', '$login', '$miasto', '$adres', '$telefon', '$email', '$haslo')";

                  if($rezultat = $polaczenie->query($sql)){
                     $_SESSION['rejestracjagut'] ="Konto utworzone pomyślnie";
                     header('location:log.php?rejestracja=true');
                  }else{
                     echo "wystapił błąd";
                  }
               }else{
                  $_SESSION['istnieje']  = "Istnieje taki użytkownik";
                  echo "istnieje taki login";
               }
            $polaczenie->close();


         }else{
            echo "błąd połączenia";
            $polaczenie->close();
         }



      }else{
         $_SESSION['bladr'] = "Wpisz brakujące dane";
         header('location:log.php?rejestracja=true');

      }








 ?>
