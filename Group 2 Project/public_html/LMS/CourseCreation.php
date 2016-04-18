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
	
	$mysqlConn = new mysqli('localhost', 'group2', 'lmsgroup2', 'group2'); 
	$CourseNames = array();
    // Check connection
    if ($mysqlConn->connect_error) {
        //header('Location: Login.php?error=4');
        die("Connection to MYSQL database failed: " . $mysqlConn->connect_error);    
    } 
	
	$Query_CourseName = "SELECT CourseName FROM LMS_Course;";	
	$result = $mysqlConn->query($Query_CourseName);
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$CourseNames[] = $row['CourseName'];
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Course Creation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="Styles/Style.css">
    <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css">

    <script src="Scripts/jquery-1.10.2.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script type="text/javascript" src="Scripts/UserValidation.js"></script>

    <style>
        .navbar .nav > li > a {
            color: darkslateblue;
            font-weight: 600;
        }

            .navbar .nav > li > a:hover {
                color: red;
                font-weight: 600;
            }
    </style>
</head>

<body style="overflow-x:hidden">
    
	<?php include 'Layout/Header.php'; ?>

    <!--content start here-->
    <div class="body-content" style="background-image:url('Images/BGImage1.jpg');
        background-size: 2000px 2000px">

        <div style="height:100px"></div>
        <div style="min-height:800px;">
            <div class="container-fluid">
                <center><h2>Course Creation</h2></center>
                <br />
                <div class="row" style="margin-top:50px; margin-bottom:100px;">
                    <div class="col-md-12">
					
					<!--start tabbed nav-->
					<div id="exTab3" class="container jumbotron">
					  <ul class="nav nav-tabs"">
						<li class="active">
							<a href="#1b" data-toggle="tab">Create New Course</a>
						</li>
						<li>
							<a href="#2b" data-toggle="tab">Add Chapter to Course</a>
						</li>
					  </ul>

					  <div class="tab-content clearfix">
					  
						<div class="tab-pane active" id="1b">						  
							<!--newCourse start here-->
							<div id="newCourse" class="jumbotron" style="font-size:medium;">
								<form action="NewCourse.php" method="POST">
									<div class="form-vertical" role="form">

									<div class="form-group">
										<label for="CourseTitle" class="control-label">Course Title</label>									
										<input type="text" id="courseTitle" name="courseTitle" class="form-control" placeholder="Enter Course Name" required />									
									</div>									
									
									<div class="form-group">
										<label for="CourseDesc" class="control-label">Course Description</label>
										<textarea id="CourseDesc" name="courseDesc" placeholder="Enter Course Description" class="form-control" cols="50" rows="2"></textarea>
									</div>
								
									<div class="form-group">
										<input id="btnSave" type="submit" value="Create Course" class="btn btn-default" onclick="return ValidateLogin()" />
										<input id="btnSubmit" type="reset" value="Reset" class="btn btn-default" onclick="" />
									</div>
									</div>
								</form>
							</div>
						<!--newCourse end here-->						  
						</div>
						
						<div class="tab-pane" id="2b">							
							<!--newChapter start here-->
							<div id="newChapter" class="jumbotron" style="font-size:medium;">
								<form action="NewChapter.php" method="POST">
									<div class="form-vertical" role="form">
								
										<div class="form-group">
											<label for="SelectCourse" class="control-label">Add Chapter to Course...</label>
											<select id="SelectCourse" class="btn btn-default form-control" name="courseName" required>																								
												<?php
													echo "<option value=''>Select...</option>";
													
													foreach($CourseNames as $key => $value)
													{
														echo '<option value="'.$value.'">'.$value.'</option>'; 
													}
												?>											
											</select>
										</div>
										
										<div class="form-group">
											<label for="ChapterName" class="control-label">Chapter Name</label>
											<input type="text" id="chapterName" name="chapterName" class="form-control" placeholder="Enter Chapter Name" required />
										</div>
										
										<div class="form-group">
											<label for="ChapterContent" class="control-label">Chapter Content</label>
											<textarea id="ChapterContent" name="chapterContent" class="form-control" cols="50" rows="10" required></textarea>
										</div>

										<div class="form-group">
											<input id="btnSave" type="submit" value="Add New Chapter" class="btn btn-default" onclick="return ValidateLogin()" />
											<input id="btnSubmit" type="reset" value="Reset" class="btn btn-default" onclick="" />
										</div>
									
									</div>
								</form>
							</div>		
						<!--newChapter end here-->						
						</div>
						
					  </div>
					</div>
					<!--end tabbed nav-->
						
					</div>
                </div>
            </div>
        </div>
    </div>
    <!--Content end here-->
	
	<?php include 'Layout/Footer.php'; ?>    

</body>
</html>
