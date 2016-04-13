<?php
session_start();
	$email = $_SESSION['Email'];
	$userName  = $_SESSION['UserName'];
	
	if ($email)
	{
		$loginLinkText = $userName .  " | Logout";
		$loginLinkHref = "Logout.php";
	}
	else
	{
		$loginLinkText = "Login";
		$loginLinkHref = "Login.php";
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Learning Management System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="Styles/Style.css">
    <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css">
    <script src="Scripts/bootstrap.js"></script>

    <script src="Scripts/jquery-1.10.2.js"></script>
   
</head>

<body style="overflow-x:hidden">

    <?php include 'Layout/Header.php'; ?>

    <!--content start here-->
    <div class="body-content" style="background-image:url('Images/BGImage1.jpg'); background-size: 2000px 2000px">

        <div style="height:100px"></div>
        <div style="min-height:800px;">
            <div class="container" style="text-align:center;">
                <h1><span style="font-weight:600; color:white">Courses Available</span></h1>
                <div class="form-group">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <a href="jQueryCourse.php">
                    <img src="Images/jquery_logo.png" onclick="" class="img-rounded" alt="Image Lost" width="300" height="300"></a>
</div>
                <div class="col-md-6">
                    <a href="Course.html">
                        <img src="Images/CSS3.jpg" class="img-rounded" alt="Image Lost" width="300" height="300"></a>
</div>
            </div>
        </div>
    </div>
    <!--Content end here-->   

    <?php include 'Layout/Footer.php'; ?>

</body>
</html>


