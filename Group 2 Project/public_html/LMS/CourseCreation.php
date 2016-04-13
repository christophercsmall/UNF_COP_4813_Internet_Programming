﻿<!DOCTYPE html>
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
    <!--header starts here-->
    <div class="navbar navbar-fixed-top navbar-default"
         style="background-color:#EDEDED">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-left navbar-brand">
                    <li>
                        <img src="Images/Ims_logo.png" alt="Image Lost"
                             height=" 70" width="100">
                    </li>
                    <li><h2>Learning Management System</h2></li>
                </ul>

                <ul class="nav navbar-nav navbar-brand navbar-right">
                    <li>
                        <a class="" title="Home" href="Home.php">
                            <span class="glyphicon glyphicon-home">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-book"></span> About
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-phone"></span> Contact
                        </a>
                    </li>

                    <li>

                        <a href="">
                            <span class="glyphicon glyphicon-list"></span> Course List
                        </a>
                    </li>

                    <li>
                        <a href="Registration.php">
                            <span class="glyphicon glyphicon-pencil"></span> Register
                        </a>
                    </li>
                    <li>
                        <a href="Login.php">
                            <span class="glyphicon glyphicon-user"></span> Login
                        </a>
                    </li>

                    <li>
                        <input type="text" class="navbar-text img-rounded" id="txtSearch"
                               placeholder="Search" />
                    </li>

                    <li>
                        <a class="" title="Home" href="">
                            <span class="glyphicon glyphicon-search">
                            </span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!--header end here-->

    <!--content start here-->
    <div class="body-content" style="background-image:url('Images/BGImage1.jpg');
        background-size: 2000px 2000px">

        <div style="height:100px"></div>
        <div style="min-height:800px;">
            <div class="container-fluid">
                <center><h2>Course Creation</h2></center>
                <br />
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <form action="DB.php" method="POST">
                        <div class="form-horizontal" role="form">

                            <div class="form-group">
                                <label for="CourseTitle" class="col-md-2 control-label">Course Title</label>
                                <div class="col-md-4">
                                    <input type="text" id="courseTitle" name="courseTitle" class="form-control"
                                           placeholder="Enter Course Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CourseDesc" class="col-md-2 control-label">Course Description</label>
                                <div class="col-md-4">
                                    <textarea id="courseDesc" name="courseDesc" placeholder="Enter Course Description"
                                              class="" cols="50" rows="2"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ChapterName" class="col-md-2 control-label">Chapter Name</label>
                                <div class="col-md-4">
                                    <input type="text" id="chapterName" name="chapterName" class="form-control"
                                           placeholder="Enter Chapter Name" />
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="ChapterContent" class="col-md-2 control-label">Chapter Content</label>
                                        <div class="col-md-4">
                                            <textarea id="chapterContent" name="chapterContent"
                                                      class="" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            &nbsp;&nbsp;&nbsp;
                                            <input id="btnSave" type="submit" value="Save" class="btn btn-default" onclick="return ValidateLogin()" />
                                            &nbsp;&nbsp;
                                            <input id="btnAddChapter" type="submit" value="Add new Chapter" class="btn btn-default"
                                                   onclick="return ValidateLogin()" />
                                            &nbsp;&nbsp;
                                            <input id="btnSubmit" type="submit" value="Reset" class="btn btn-default"
                                                   onclick="return ValidateLogin()" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <!--Php insertion-->

                            </div>
                        </div>
            </div>
        </div>
    </div>
    <!--Content end here-->


    <!--footer starts here-->
    <div class="footer navbar-fixed-bottom">
        <div class="container">
            <div class="col-md-4 ftr-grid">
                <div class="ftr-grid-left">
                    <img src="Images/location.png" alt="">
                </div>
                <div class="ftr-grid-right">
                    <p>1 University of North Fl Dr<span class="local">Jackosnville, FL- 32224</span></p>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="col-md-4 ftr-grid">
                <div class="ftr-grid-left">
                    <img src="Images/email.png" alt="">
                </div>
                <div class="ftr-grid-right">
                    <p><a href="#">helpdesk@unf.edu </a><span class="local">Help desk Email</span></p>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="col-md-4 ftr-grid">
                <div class="ftr-grid-left">
                    <img src="Images/phone.png" alt="">
                </div>
                <div class="ftr-grid-right">
                    <p>(904) 620-1000<span class="local">(904) 620-HELP (4357)</span></p>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
    <!--footer end here-->

</body>
</html>
