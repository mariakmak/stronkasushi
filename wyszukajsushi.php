<html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="style.css" type="text/css">

        
        <style>

   div.c{padding:5%;
       text-align: center;
         font-size:30px;

        }
        </style>
        
  </head>

<body>

<div class=container>



<ul>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/sushimenu.php">Home</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/zamowienia.php">Zamówienia</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/rezerwacje.php">Rezerwacje</a></li>
  
</ul>

<br><br>

<h2> Czego szukasz?</h2>

<div class=c>

	<form action="wyszukajsushi.php" method = "POST">
              
			   
			  Nazwa : <input name="nazwa"> <br>
			  Cena: <input name="cena"> <br>
			 
			  <input type="reset" value="Wyczyść">
			  <input type="submit" value ="Znajdź">
	   
	  </form>
    </div>
	 
<?php

    include "autoryzacja.php";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die("Błąd połączenia z bazą");
	
	mysqli_query($conn, "SET NAMES 'utf8'");


	$nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];


if($nazwa && $cena ) {
    
    echo "if dziala";
    
 
    $sql="SELECT * FROM sushi WHERE nazwa='$nazwa' AND cena='$cena'";
    $result=mysqli_query($conn, $sql);

 
    
    echo '<table>';
    echo '<tr>';
    echo '<th>Numer</th><th>Nazwa</th><th>Skladniki</th><th>Cena</th>';
    echo '</tr>';
            
    while($row=mysqli_fetch_array($result))
    {
    
        echo '<tr>';
        echo '<td>'.$row['sushiid'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['skladniki'].'</td><td>'.$row['cena'].'</td>';
        echo '</tr>';
    }
    echo '<br>';
    echo '</table>';

    

	
}






elseif($nazwa && $cena=="" ) {
    
    echo "if dziala";
    

    $sql="SELECT * FROM sushi WHERE nazwa='$nazwa'";
    $result=mysqli_query($conn, $sql);

    echo '<table>';
    echo '<tr>';
    echo '<th>Numer</th><th>Nazwa</th><th>Skladniki</th><th>Cena</th>';
    echo '</tr>';
            
    while($row=mysqli_fetch_array($result))
    {
    
        echo '<tr>';
        echo '<td>'.$row['sushiid'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['skladniki'].'</td><td>'.$row['cena'].'</td>';
        echo '</tr>';
    }
    echo '<br>';
    echo '</table>';
    

	
}






elseif($nazwa=="" && $cena ) {
    
   
	
    
    $sql="SELECT * FROM sushi WHERE cena='$cena'";
    $result=mysqli_query($conn, $sql);

    

echo '<table>';
echo '<tr>';
echo '<th>Numer</th><th>Nazwa</th><th>Skladniki</th><th>Cena</th>';
echo '</tr>';
		
while($row=mysqli_fetch_array($result))
{

    echo '<tr>';
    echo '<td>'.$row['sushiid'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['skladniki'].'</td><td>'.$row['cena'].'</td>';
    echo '</tr>';
}
echo '<br>';
echo '</table>';

    

	
}






?>
</div> 
</body>
	  
</html>