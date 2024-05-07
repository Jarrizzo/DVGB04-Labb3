<html>
<head>
	<title>CD Library</title>
</head>

<body>
	<h3>Recordings of the same piece</h3>
	<hr>

	<p>A list of how many recordings there are of the same piece</p>

<?php

	/* Koppla upp till ditt konto p  servern och v lj databas */
	
    $db = mysqli_connect("localhost", "isaknils100", "Isakisak96", "isaknils100_Labb3" );

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr ga och spara den i en variabel */
	$query = "SELECT c.Composition_Name, t1.BWV_Num, COUNT(DISTINCT t2.Instrument) AS Num_Different_Instruments
			  FROM Composition AS c
			  INNER JOIN Tracks AS t1 ON c.BWV_Num = t1.BWV_Num
			  LEFT JOIN Tracks AS t2 ON t1.BWV_Num = t2.BWV_Num
			  GROUP BY c.Composition_Name, t1.BWV_Num
			  HAVING COUNT(DISTINCT t2.Instrument) > 1 OR COUNT(DISTINCT t2.Instrument) = 1
			 ";

	/* K r SQL-fr gan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	if(mysqli_num_rows($result) > 0){
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Composition_Name</th>";
		echo "<th>BWV_Num</th>";
		echo "<th>Num_Different_Instruments</th>";
		
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["Composition_Name"] ."</td>";
			echo "<td>". $row["BWV_Num"] ."</td>";
			echo "<td>". $row["Num_Different_Instruments"] ."</td>";

			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error";
	}
?>

<br><br>
<a href="index.php">Home</a>
</body>

</html>