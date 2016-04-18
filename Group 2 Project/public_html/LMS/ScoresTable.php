<?php

	$mysqlConn = new mysqli('localhost', 'group2', 'lmsgroup2', 'group2'); 
    // Check connection
    if ($mysqlConn->connect_error) {
        //header('Location: Login.php?error=4');
        die("Connection to MYSQL database failed: " . $mysqlConn->connect_error);    
    } 
	
	$Query_UserID = "SELECT UserID FROM LMS_User where Email= '".$email."';";
	$result = $mysqlConn->query($Query_UserID);
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$UserID = $row['UserID'];
		}
	}
	
	$Query_SELECT_CourseName_Score = "SELECT LMS_Course.CourseName, LMS_UserCourse.Score FROM LMS_Course, LMS_UserCourse WHERE LMS_UserCourse.UserID = ".$UserID.";";
	$result = $mysqlConn->query($Query_SELECT_CourseName_Score);
	
	echo "<table class='table table-hover table-bordered' style='width:25%;'>";
	echo "<th>Course Name</th>";
	echo "<th>Score</th>";
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr>";
				echo "<td>";
					echo $row['CourseName'];
				echo "</td>";
				echo "<td>";
					echo $row['Score'];
				echo "</td>";
			echo "</tr>";
		}
	}
	
	echo "</table>";
?>