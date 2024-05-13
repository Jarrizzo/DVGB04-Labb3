<html>
<head>
	<title>CD Library</title>
</head>

<body>
	<h3>Harpsichord</h3>
	<hr>

	<p>A List of the works with the searched BWV Number</p>

<?php
	
	$db = mysqli_connect("localhost", "xxxXXX100", "PassWord", "xxxXXX100_Labb3" );

    if(!$db){
        echo("Could not connect to MySQL server!" . mysqli_connect_error());
    }

        if (isset($_POST['temp'])) {
            $temp = $_POST['temp'];
            echo "Search result for: " . $temp. "\n";
            echo "\n";      
			$sql = "SELECT Composition.Composition_Name,Tracks.BWV_Num,Tracks.New_CD_ID FROM Composition
                    JOIN Tracks ON Composition.BWV_Num = Tracks.BWV_Num
					WHERE Composition.BWV_Num = ?";
    
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt,"s", $temp);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
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
        
            
    }

?>
<br><br>
<a href="index.php">Home</a>
</body>

</html>