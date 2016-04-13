<?php
session_start();

// APPROACH TO CALL MYSQL from PHP - MySQLi
function GetMySQLDatabaseCon()
{       
    // $mysqlConn = new mysqli('localhost', 'root', 'pavansiree', 'LMS'); 
    $mysqlConn = new mysqli('localhost', 'group2', 'lmsgroup2', 'group2'); 
    // Check connection
    if ($mysqlConn->connect_error) {
        //header('Location: Login.php?error=4');
        die("Connection to MYSQL database failed: " . $mysqlConn->connect_error);    
    } 

    return $mysqlConn;
}

if($_POST['btnLogin'])
{
    $Email = $_POST['txtLoginEmail'];
    $Password = $_POST['txtLoginPassword'];

    if($Email=="" || $Password=="")
    {
         header('Location: Login.php?error=2');
         exit;
    }
    
    // Create connection
    $mysqlConn = GetMySQLDatabaseCon();
    
    // Query
    $sqlQuery = "SELECT * FROM LMS_User where Email= '".$Email."' && UserPassword = '".$Password."';";
    $resultData = $mysqlConn->query($sqlQuery);

    if ($resultData->num_rows > 0) {
        while($record = $resultData->fetch_assoc()) {
            //echo "id: " . $record["UserID"]. " - Name: " . $record["UserName"]. " " . $record["Email"]. "<br>";                       
            $_SESSION['Email'] = $Email;
            $_SESSION['UserName'] = $record["UserName"];            
            header('Location: UserAccount.php');
        }
    } else {
        header('Location: Login.php?error=1');
    }
}

if($_POST['btnRegisterUser'])
{
    $UserName = $_POST['txtRegisterFullName'];
    $Email = $_POST['txtRegisterEmail'];
    $Password = $_POST['txtRegisterPassword'];
    $ConfirmPassword = $_POST['txtRegisterConfirmPassword'];
    $DOB = $_POST['txtRegisterDOB'];
    $Gender = $_POST['drpRegisterGender'];
    $Country = $_POST['drpRegisterCountry'];
    $Education = $_POST['drpRegisterEducation'];
   
    if($UserName=="" || $Email=="" || $Password=="" || $ConfirmPassword=="")
    {
         header('Location: Registration.php?error=1');
         exit;
    }
        
    // Create connection
    $mysqlConn = GetMySQLDatabaseCon();
    
    // Check if email already registered or not
    $sqlCheckEmail = "SELECT * FROM LMS_User where Email= '".$Email."';";
    $resultData = $mysqlConn->query($sqlCheckEmail);

    if ($resultData->num_rows > 0) {
        while($record = $resultData->fetch_assoc()) {
            header('Location: Registration.php?error=3');
            exit;
        }
    } 

    // Query
    $sqlQuery = "insert into LMS_User(UserName, Email, UserPassword, DOB, Gender, Country, HighestEducation)
                values('".$UserName."', '".$Email."', '".$Password."', '".$DOB."',
                '".$Gender."', '".$Country."', '".$Education."');";

    if($mysqlConn -> query($sqlQuery) === TRUE)
    {
        $_SESSION['UserName'] = $UserName;
        $_SESSION['Email'] = $Email;
        header('Location: UserAccount.php');  
        exit;
    }
    else
    {
        header('Location: Registration.php?error=2');
        exit;        
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
