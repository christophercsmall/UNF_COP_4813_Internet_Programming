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
    
    $courseName = $_POST['courseName'];
    $chapterName = $_POST['chapterName'];
    $creator = $_SESSION['UserName'];
    $content = $_POST['chapterContent'];

    $getCourseID = "SELECT CourseID FROM LMS_Course WHERE CourseName = '".$courseName."';";
    $courseIdRows = $connection->query($getCourseID);
    $row = $courseIdRows->fetch_assoc();
    $courseId = $row["CourseID"];

    if ($checkForNull = $connection->query("SELECT CourseID FROM LMS_Chapter WHERE (CourseID = '$courseId')") )
    {
        $numRows = $checkForNull->num_rows;
    }
    $pageNumber = 0;
    if($numRows > 0)
    {
        $getMaxPage = "SELECT MAX(PageNumber) FROM LMS_Chapter WHERE (CourseID = '$courseId')";
        $pageNumberRows = $connection->query($getMaxPage);
        $row = $pageNumberRows->fetch_assoc();

        $pageNumber = $row["MAX(PageNumber)"];
        $pageNumber = intval($pageNumber);
    }

    if(empty($pageNumber))
    {
        $pageNumber = 0;
    }
    $pageNumber = $pageNumber + 1;

    $strCommand = "INSERT INTO LMS_Chapter(ChapterName, ChapterContent, PageNumber, CourseID) VALUES (";
    $strCommand = $strCommand."'$chapterName', '$content', '$pageNumber', '$courseId');";

    $result = $connection->query($strCommand);
	
	header('Location: CourseCreation.php');
}

?>