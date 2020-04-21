<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<style>

</style>
</head>

	<body>

  <div class=container>
	<h1>SUSHIBAR</h1>
	<p class=a>Zapraszamy na pyszne sushi.</p>
	<p class=b>Godziny otwarcia:</p>
	<p class=b>pon-pt: 15:00-22:00</br>
	sobota-niedziela: 17:00-23:00</p>
	
	
<ul>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/sushimenu.php">Home</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/zamowienia.php">Zamówienia</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/rezerwacje.php">Rezerwacje</a></li>
  
</ul>
	<h2>MENU</h2>



<p class=c><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/wyszukajsushi.php"> Wyszukaj potrawę </a></p>

<?php
        include("autoryzacja.php");  

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('BĹ‚ad poĹ‚Ä…czenia z serwerem: ' . mysqli_connect_error());


mysqli_query($conn, "SET NAMES 'utf8'");


$result=mysqli_query($conn,"SELECT * FROM sushi");



//$result=mysqli_query($conn,"SELECT * FROM sushi WHERE nazwa='".$_POST['nazwa']."' or cena='".$_POST['cena']."';")



echo '<table border="1">';
while($row=mysqli_fetch_array($result))
{

    echo '<tr>';
    echo '<td>'.$row['sushiid'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['skladniki'].'</td><td>'.$row['cena'].'</td>';
    echo '</tr>';
}
echo '<br>';
echo '</table>';




	
	



?>

</div>
</body>
</html>