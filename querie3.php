<html>
<head>
	<title>CD Library</title>
</head>

<body>
	<h3>Recording of BWV 780</h3>
	<hr>

	<p>A list of all CDs with a recording of BWV 780</p>
<?php

	/* Koppla upp till ditt konto p  servern och v lj databas */
	
    $db = mysqli_connect("localhost", "isaknils100", "Isakisak96", "isaknils100_Labb3" );

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr ga och spara den i en variabel */
	$query = "SELECT CD.CD_Title, CD.Performer FROM CD
			  JOIN Tracks
			  WHERE Tracks.New_CD_ID = CD.NEW_CD_ID
			  AND Tracks.BWV_Num = 'BWV 780'
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
		echo "<th>CD_Title</th>";
		echo "<th>Performer</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["CD_Title"] ."</td>";
			echo "<td>". $row["Performer"] ."</td>";
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