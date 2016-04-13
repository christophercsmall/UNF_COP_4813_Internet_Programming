<?php

?>

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

