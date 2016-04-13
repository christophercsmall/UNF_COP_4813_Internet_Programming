<?php
session_start();
require 'UserValidate.php';

// Create connection
$mysqlConn = GetMySQLDatabaseCon();
$username = $_SESSION['UserName'];
$email = $_SESSION['Email'];

//Redirect if not logged in
if($email == null)
{
	header('Location: Login.php');
	exit;  
}
else
{
	// Query
    $sqlQuery = "SELECT * FROM LMS_User where Email='$email'";
    $resultData = $mysqlConn->query($sqlQuery);

    if ($resultData->num_rows > 0) 
	{
        $record = $resultData->fetch_assoc();
    } 
	else {
		header('Location: Login.php?error=1'); }
}



?>

<!DOCTYPE html>
<html>

<head>
<<title>Student Account</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="Styles/Style.css">
    <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css">
    <script src="Scripts/bootstrap.js"></script>

    <script src="Scripts/jquery-1.10.2.js"></script>

   </head>


<body>
  <?php include 'Layout/Header.php'; ?>
	<!--content start here-->

    <div class="body-content" style="background-image:url('Images/BGImage1.jpg'); background-size: 2000px 2000px">

        <div style="height:100px"></div>
        <div style="min-height:800px;">
				<div id="fullName">
					<?php echo "$username"; ?>
				</div>
				<div id="email">
					<?php echo "$email"; ?>
				</div>
				<div id="password">
				<p>Change password</p>
					<form id="changePassword" name="changePassword" action="UpdateAccount.php">
					<table>
					<tr>
						<td>Current Password:</td> <td><input type="password" id="currentPassword" name="currentPassword"/></td>
					</tr>
					<tr>
						<td>New Password:</td> <td><input type="password" id="newPassword" name="newPass1"/></td>
					</tr>
					<tr>
						<td>Confirm Password:</td> <td><input type="password" id="confirmPassword" name="newPass2"/></td>
					</tr>
					</table>
					<input type="submit"/>
					</form>
				</div>
				
				<div id="completedCourses">
				Put list of completed courses and scores and list here.
				</div>

				
        </div>
    </div>

    <!--Content end here-->

 <?php include 'Layout/Footer.php'; ?>
</body>
</html>

