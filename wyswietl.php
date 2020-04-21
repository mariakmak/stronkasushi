<html>

<head>
        <meta charset="utf-8">

</head>

	<body>
	
	        <h2>Kmak Maria zadanie 1 kolokwium</h2>

<?php

include("autoryzacja.php");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());
echo "Połączenie udane <br>";




$result=mysqli_query($conn,"SELECT * FROM kolokwium_samochody order by rok_produkcji ASC");
	
	echo '<table border="1">';
    while($row=mysqli_fetch_array($result))
		{	
			echo '<tr>';
			echo '<td>'.$row['nr_rejestracyjny'].'</td><td>'.$row['marka'].'</td><td>'.$row['model'].'</td><td>'.$row['rok_produkcji'].
			'</td>';
			echo '</tr>';
		}

	echo '</table>';
	
	$result2=mysqli_query($conn,"SELECT * FROM kolokwium_kierowcy order by nazwisko_kierowcy ASC");
	
	
    echo '<table border="1">';
    while($row=mysqli_fetch_array($result2))
		{	
			echo '<tr>';
			echo '<td>'.$row['id_kierowcy'].'</td><td>'.$row['imie_kierowcy'].'</td><td>'.$row['nazwisko_kierowcy'].'</td><td>'.$row['kategoria_prawa_jazdy'].
			'</td>';
			echo '</tr>';
		}

	echo '</table>';
	



?>

</body>
</html>
