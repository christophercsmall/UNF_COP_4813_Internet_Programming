<?php 
	session_start();
	
	if ($_SESSION['error'] == "error_login")
	{
		$error = "Invalid login attempt. Try again.";
	}
?>

<?php include 'beginHTML.php';?>

    <form action="auth.php" method="post" id="form">

        <div id="" class="textContent textInput" style="">
            <div style="padding-left:20%; padding-right:20%; margin-bottom:50px; text-align:center;">
                <h1>Login</h1>
                <h3>(Please type your username and password.)</h3>
                Username: <input id="username" name="username" type="text" class="textContent textInput" style=""/>
                <br />
                Password: <input id="password" name="password" type="password" class="textContent textInput" style="" />
                <br />
                <input id="login" type="submit" class="textInput" value="Login" />
            </div>      
                     
        </div>
    </form><!--end form-->
	<?php echo $error; ?>
    
	
<?php include 'endHTML.php';?>