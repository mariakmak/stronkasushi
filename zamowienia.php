<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="style.css" type="text/css">

        <style>
          
          div.container{margin:0 130;
                    padding:100;}

   div.c{text-align: center;
         font-size:30px;

        }
    p.a{padding-bottom:50px;}

    form{padding:50px}
        </style>
    
    

        
    </head>

    <body>



<div class=container>	

<h1> Złóż zamówienie </h1>



<ul>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/sushimenu.php">Home</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/zamowienia.php">Zamówienia</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/rezerwacje.php">Rezerwacje</a></li>
  
</ul>

<br><br>

<p class=a> Aby zamówienie zostało przyjęte, należy wypełnić wszystkie pola </p>


<div class=c>
        <form action = "zamowienia.php" method="POST">
           
            Numer produktu: <input name = "idproduktu"> <br>
            Adres: <input name = "adres"> <br>
            Telefon: <input name = "telefon"> <br>
            Płatność przez internet (T/N): <input name = "zaplacone"> <br>
            
            <input type="reset" value="Usuń">
            <input type="submit" value="Wyślij"> <br>
        </form>
</div>

        <?php
        include("autoryzacja.php");  

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
        or die('BĹ‚ad poĹ‚Ä…czenia z serwerem: ' . mysqli_connect_error());
        

        mysqli_query($conn, "SET NAMES 'utf8'");



// odbieramy dane z formularza
$adres = $_POST['adres'];
$telefon = $_POST['telefon'];
$zaplacone = $_POST['zaplacone'];
$idproduktu = $_POST['idproduktu'];



if($adres && $telefon && $zaplacone && $idproduktu) {
   
    
    

    $sql = "INSERT INTO zamowienia( adres, telefon, zaplacone, idproduktu) VALUES ('$adres','$telefon','$zaplacone','$idproduktu')";
    $result=mysqli_query($conn,$sql) ;

    if($result) echo "Zamówienie zostało przyjęte";

    else echo "Wystąpił błąd. Sprawdź czy wszystkie pola zostały wypełnione."; 

    mysqli_close($conn);
}
   
?> 
</div>
    </body>
</html> 