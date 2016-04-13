<?php
session_start();
	$email = $_SESSION['Email'];
	$userName  = $_SESSION['UserName'];
	
	if ($email)
	{
		$loginLinkText = $userName .  " | Logout";
		$loginLinkHref = "Logout.php";
		header('Location: UserAccount.php');
		exit;
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
    <script src="Scripts/UserValidation.js"></script>

    <script src="Scripts/jquery-1.10.2.js"></script>
  
</head>

<body style="overflow-x:hidden">

    <?php include 'Layout/Header.php'; ?>
   
    <div class="body-content" style="background-image:url('Images/BGImage1.jpg');
        background-size: 2000px 2000px">
        
        <form method="post" action="UserValidate.php">
        <div style="height:100px"></div>
        <div style="min-height:800px;">
            <div class="container-fluid">
                                                 
                <div class="row">
                <div id="errorDiv" name="errorDiv" class="alert alert-danger" style="display:none">
                    Error
                </div>
            </div>

            <div class="row">
                <div id="successDiv" name="successDiv" class="alert alert-success" style="display:none">
                    Success
                </div>
            </div>
 
                <center><h2>Log in</h2></center>
                <br />
               
                <?php
	$error = $_GET['error'];
    if($error != '')
    {
	if($error == 1)
    {
        echo "<script>
        document.getElementById('errorDiv').innerHTML = 'Server Error: Invalid credentials';
	    document.getElementById('errorDiv').style.display = 'block';
              </script>";    
		//echo "<span class='fontStyle' style='color:red'>Server Error: Invalid credentials</span><br />";
    }
	elseif ($error == 2)
    {
        echo "<script>
        document.getElementById('errorDiv').innerHTML = 'Server Error: Please enter email or password';
	    document.getElementById('errorDiv').style.display = 'block';
              </script>";    
    }	
    elseif ($error == 3)
    {
        echo "<script>
        document.getElementById('errorDiv').innerHTML = 'Server Error: Please login first';
	    document.getElementById('errorDiv').style.display = 'block';
              </script>";    
    }
	elseif ($error == 4)
    {
        echo "<script>
        document.getElementById('errorDiv').innerHTML = 'Server Error: MySQL database connection error';
	    document.getElementById('errorDiv').style.display = 'block';
              </script>";    
    }
    }
    else
    {
        echo "<script>
        document.getElementById('errorDiv').innerHTML = '';
	    document.getElementById('errorDiv').style.display = 'none';
              </script>"; 
    }
?>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="form-horizontal" role="form">

                            <div class="form-group">
                                <label for="Email" class="col-md-2 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" id="txtLoginEmail" name="txtLoginEmail" class="form-control"
                                           placeholder="Enter your Email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password" class="col-md-2 control-label">Password</label>
                                <div class="col-md-4">
                                    <input type="password" id="txtLoginPassword" name="txtLoginPassword" class="form-control"
                                           placeholder="Enter password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input id="btnLogin" name="btnLogin" type="submit" value="Submit" 
                                    class="btn btn-default" onclick="return ValidateLogin()" />
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="/User/Register">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Sign up
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>

    <?php include 'Layout/Footer.php'; ?>

</body>
</html>


