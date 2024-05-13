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
	
	$db = mysqli_connect("localhost", "xxxXXX100", "PassWord", "xxxXXX100_Labb3" );

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr ga och spara den i en variabel */
	$query = "SELECT DISTINCT Composition.Composition_Name, COUNT(DISTINCT CD.New_CD_ID) AS NUMBER_OF_RECORDINGS
			  FROM CD
			  JOIN Tracks ON CD.New_CD_ID = Tracks.New_CD_ID
			  JOIN Composition ON Tracks.BWV_Num = Composition.BWV_Num
			  GROUP BY Composition.New_CD_ID, Composition.Composition_Name
			  ORDER BY NUMBER_OF_RECORDINGS DESC;
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