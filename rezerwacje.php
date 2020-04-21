<html>

<head>
<link rel="stylesheet" href="style.css" type="text/css">
<style>

div.c{
         font-size:30px;

        }

table{margin:30px 150px;}

td{padding:10px;
    text-align: center;}

</style>
</head>

<body>

<div class=container>

<h1>Rezerwacje stolików</h1>

<ul>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/sushimenu.php">Home</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/zamowienia.php">Zamówienia</a></li>
  <li><a href="https://wierzba.wzks.uj.edu.pl/~18_kmak/stronka%20sushi/rezerwacje.php">Rezerwacje</a></li>
  
</ul>



    </br></br></br></br>

<div class="c">

<form action = "rezerwacje.php" method="POST">
            Numer stolika: <input name = "nrstolika"> <br>
            Godzina i data YYYY-MM-DD hh:mm:ss: <input name = "godzinaidata"> <br>


            <input type="reset" value="Usuń">
            <input type="submit" value="Wyslij"> <br>
        </form>
        <br>
</div>

    
        <?php
        include("autoryzacja.php");
 
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
        or die('Bład połączenia z serwerem: ' . mysqli_connect_error());

        mysqli_query($conn, "SET NAMES 'utf8'");

        $nrstolika = $_POST['nrstolika'];
        $godzinaidata = $_POST['godzinaidata'];

if($nrstolika && $godzinaidata) {
    
   
    
    // dodajemy rekord do bazy
    $sql = "INSERT INTO rezerwacje (nrstolika,godzinaidzien) VALUES ('$nrstolika','$godzinaidata')";
    $result=mysqli_query($conn,$sql) ;
    
    if($result) echo "Dziękujemy za dokonanie rezerwacji";
    else echo "Błąd nie udało się dokonać rezerwacji";
    
    
}




$result=mysqli_query($conn,"SELECT * FROM stoliki");
    echo '<table border="1">';
    
    echo '<tr>';
    echo '<th>Numer stolika</th><th>ilosć miejsc</th>';
    echo '</tr>';


	while($row=mysqli_fetch_array($result))
		{	
			echo '<tr style="background-color:#fae9d5ff">';
			echo '<td>'.$row['nrstolika'].'</td><td>'.$row['iloscmiejsc'].'</td>';
		}

    echo '</table>';
    
	
    mysqli_close($conn);



?>

</div>
 
</body>
</html>