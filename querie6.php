<html>
<head>
	<title>CD Library</title>
</head>

<body>
	<h3>Compositions with F# minor</h3>
	<hr>

	<p>A list of all the compositions with the key F# minor</p>

<?php

	/* Koppla upp till ditt konto p  servern och v lj databas */
	
    $db = mysqli_connect("localhost", "isaknils100", "Isakisak96", "isaknils100_Labb3" );

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr ga och spara den i en variabel */
	$query = "SELECT Composition_Name FROM Composition 
			  WHERE Composition_Name LIKE '%F# Minor'
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
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["Composition_Name"] ."</td>";
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