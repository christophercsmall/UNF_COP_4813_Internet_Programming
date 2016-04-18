<?php
session_start();

$servername = "localhost";
$loginuser = "group2";
$password = "lmsgroup2";

$connection = new mysqli($servername, $loginuser, $password);

//Check connection
if($connection->connect_error)
{
    die("Connection Failed: " . $connection->connect_error);
    exit("Connection Failed");
}
//echo "connect successful"; // TODO: Remove

$sql = "USE group2;";
$connection->query($sql);

insert($connection);
mysqli_close($connection);

function insert($connection)
{

    if($_POST['isManual'] == "manual")
    {
        $manual = "true";
    }
    else
    {
        $manual = "false";
    }
    
    $name = $_POST['courseTitle'];
    $desc = $_POST['courseDesc'];
    $creator = $_SESSION['UserName'];

    $getCourseID = "SELECT CourseID FROM LMS_Course WHERE CourseName = '".$name."';";
    $courseIdRows = $connection->query($getCourseID);
    $row = $courseIdRows->fetch_assoc();
    $courseId = $row["CourseID"];

    if(empty($courseId))
    {
        $strCommand = "INSERT INTO LMS_Course(CourseName, CourseDescription, CreatedBy, CreatedOn) VALUES ( ";
        $strCommand = $strCommand . " '$name',";
        $strCommand = $strCommand . " '$desc',";
        $strCommand = $strCommand . " '$creator',";
        $strCommand = $strCommand . " NOW());";
		$result = $connection->query($strCommand);
    }
	else
	{
		header('Location: Home.php');
	}
	
	header('Location: CourseCreation.php');
}

?>