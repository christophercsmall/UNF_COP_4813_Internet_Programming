<?php
session_start();

$Email = $_SESSION['Email'];
$Score = $_POST['Score'];

$mysqlConn = new mysqli('localhost', 'group2', 'lmsgroup2', 'group2'); 
    // Check connection
    if ($mysqlConn->connect_error) {
        //header('Location: Login.php?error=4');
        die("Connection to MYSQL database failed: " . $mysqlConn->connect_error);    
    } 
	
	$Query_CourseID = "SELECT CourseID FROM LMS_Course WHERE CourseName='jQuery';";	
	$result = $mysqlConn->query($Query_CourseID);
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$CourseID = $row['CourseID'];
		}
	}
	
	$Query_UserID = "SELECT UserID FROM LMS_User where Email= '".$Email."';";
	$result = $mysqlConn->query($Query_UserID);
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$UserID = $row['UserID'];
		}
	}
		
	$Query_INSERT_SCORE = "INSERT INTO LMS_UserCourse(Score, CourseID, UserID) VALUES(".$Score.", ".$CourseID.", ".$UserID.");";

	mysqli_query($mysqlConn, $Query_INSERT_SCORE);
	
	mysqli_close($mysqlConn);
	
	header('Location: UserAccount.php');
?>