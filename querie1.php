<html>
<head>
	<title>CD Library</title>
</head>

<body>
	<h3>Home</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p  servern och v lj databas */
	
    $db = mysqli_connect("localhost", "isaknils100", "Isakisak96", "isaknils100_Labb3" );

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr ga och spara den i en variabel */
	$query = "SELECT Composition.Composition_Name FROM Composition
			  JOIN Tracks ON Tracks.BWV_Num = Composition.BWV_Num 
			  AND Tracks.New_CD_ID = Composition.New_CD_ID
			  WHERE Instrument = 'Harpsichord'
			 ";

	/* K r SQL-fr gan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* H r skriver jag ut antalet rader i resultat-tabellen */
	echo "<P>antal: " . mysqli_num_rows($result) . " studenter\n </P>";

?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>StudentID</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Name</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Year</th>
    </tr>


<?php

/* H mta en rad i taget fr n resultat-tabellen och l gg attributv rdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
while (list($spid, $sname, $year) = mysqli_fetch_row($result))
{
        echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $spid . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $sname . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $year . "</td>";
      echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>