<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 4/7/2016
 * Time: 10:59 AM
 */
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

$url = $_SERVER['REQUEST_URI'];
$questionMarkLocation = strrpos($url, "?");
$line = substr($url, $questionMarkLocation+1);
$args = explode("&", $line);
$action = $args[0];

//if(strcmp($action, "insert") == 0)
//{
//    insert($connection);
//}
//else if(strcmp($action, "delete") == 0)
//{
//    delete();
//}
//else if(strcmp($action, "update") == 0)
//{
//    update();
//}
//else
//{
//    //TODO: Log something just in case
//}

insert($connection);
mysqli_close($connection);
header("Location: CourseCreation.php");

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
    $creator = "test";

    $chapter = $_POST['chapterName'];
    $content = $_POST['chapterContent'];

    $getCourseID = "SELECT CourseID FROM LMS_Course WHERE (CourseName = '$name') AND (CreatedBy = '$creator')";
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
        if($connection->query($strCommand) === TRUE )
        {
//            echo "<br/>";
//            echo "record hopefully created successfully";
//            echo "<br/>";
        }
        else
        {
//            echo "<br/>";
//            echo $strCommand;
//            echo "<br/>";
//            echo "we done goofed: " . $connection->error;
//            echo "<br/>";
        }
    }

    $getCourseID = "SELECT CourseID FROM LMS_Course WHERE (CourseName = '$name') AND (CreatedBy = '$creator')";
    $courseIdRows = $connection->query($getCourseID);
    $row = $courseIdRows->fetch_assoc();
    $courseId = $row["CourseID"];

//    echo "<br>";
//    var_dump($row);
//    echo ":::: $row";
//    echo "<br>";
//    var_dump($courseId);
//    echo ":::: $courseId";
//    echo "<br>";



    if ($checkForNull = $connection->query("SELECT CourseID FROM LMS_Chapter WHERE (CourseID = '$courseId')") )
    {
        $numRows = $checkForNull->num_rows;
//        var_dump($numRows);
//        echo ":::: $row<br>";
    }
    $pageNumber = 0;
    if($numRows > 0)
    {
        $getMaxPage = "SELECT MAX(PageNumber) FROM LMS_Chapter WHERE (CourseID = '$courseId')";
        $pageNumberRows = $connection->query($getMaxPage);
        $row = $pageNumberRows->fetch_assoc();
//        echo "<br>";
//        var_dump($row);
//        echo ":::: $row";
//        echo "<br>";
        $pageNumber = $row["MAX(PageNumber)"];


        $pageNumber = intval($pageNumber);
//        var_dump($pageNumber);
//        echo ":::: $pageNumber<br>";

    }

    if(empty($pageNumber))
    {
        $pageNumber = 0;
    }
    $pageNumber = $pageNumber + 1;

    $strCommand = "INSERT INTO LMS_Chapter(ChapterName, ChapterContent, PageNumber, CourseID) VALUES (";
    $strCommand = $strCommand."'$chapter', '$content', '$pageNumber', '$courseId');";

    
    if($connection->query($strCommand) === TRUE )
    {
//        echo "<br/>";
//        echo "record hopefully created successfully";
//        echo "<br/>";
    }
    else
    {
//        echo "<br/>";
//        echo $strCommand;
//        echo "<br/>";
//        echo "we done goofed: " . $connection->error;
//        echo "<br/>";
    }

}

// TODO: lookup and delete
function delete()
{

}

// TODO: lookup -> pull data -> alter data -> push data
function update()
{

}

?>