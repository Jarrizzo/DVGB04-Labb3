<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CD Library</title>
</head>

<body>
	<h1>Home</h1>
	<hr>

	<div>
		<a href="querie1.php">Harpsichord</a><br>
		<a href="querie2.php">Available Concertos</a><br>
		<a href="querie3.php">Recording of BWV 780</a><br>
		<a href="querie4.php">Glenn Gould recordings</a><br>
		<a href="querie5.php">Recordings of the same piece</a><br>
		<a href="querie6.php">Compositions with F# minor</a><br>
	</div>

	<h3>Search Compositions by Instrument</h3>
    <form action="instrumentSearch.php" method="POST">
        <label for="tmp">Instrument:</label>
        <input type="text" id="tmp" name="tmp"><br>
        <button type="submit">Search</button>
    </form>

    <?php
	$db = mysqli_connect("localhost", "xxxXXX100", "PassWord", "xxxXXX100_Labb3" );
	
	if(!$db){
		echo("Could not connect to MySQL server!" . mysqli_connect_error());
		}

    ?>

<h3>Search Compositions by BWV Number</h3>
    <form action="BWVSearch.php" method="POST">
        <label for="temp">BWV Number:</label>
        <input type="text" id="temp" name="temp" value="BWV 000" pattern="BWV \d{1,4}"><br>
        <button type="submit">Search</button>
    </form>

<?php

    ?>

<?php	

	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }

	$sql = "SELECT * FROM CD";
	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result) > 0){
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Performer</th>";
		echo "<th>CD_Title</th>";
		echo "<th>New_CD_ID</th>";
		echo "<th>CD_Lable</th>";
		echo "<th>Time</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["Performer"] ."</td>";
			echo "<td>". $row["CD_Title"] ."</td>";
			echo "<td>". $row["New_CD_ID"] ."</td>";
			echo "<td>". $row["CD_Lable"] ."</td>";
			echo "<td>". $row["Time"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error";
	}	

	$sql = "SELECT * FROM Composition";
	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result) > 0){
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Composition_Name</th>";
		echo "<th>BWV_Num</th>";
		echo "<th>New_CD_ID</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["Composition_Name"] ."</td>";
			echo "<td>". $row["BWV_Num"] ."</td>";
			echo "<td>". $row["New_CD_ID"] ."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error";
	}	

	$sql = "SELECT * FROM Orchestra";
	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result) > 0){
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Orchestra</th>";
		echo "<th>Conductor</th>";
		echo "<th>New_CD_ID</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["Orchestra"] ."</td>";
			echo "<td>". $row["Conductor"] ."</td>";
			echo "<td>". $row["New_CD_ID"] ."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error";
	}	

	$sql = "SELECT * FROM Tracks";
	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result) > 0){
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>BWV_Num</th>";
		echo "<th>Instrument</th>";
		echo "<th>New_CD_ID</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>". $row["BWV_Num"] ."</td>";
			echo "<td>". $row["Instrument"] ."</td>";
			echo "<td>". $row["New_CD_ID"] ."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error";
	}	

	mysqli_close($db);
?>

<br><br>
<a href="index.php">Home</a>
</body>

</html>