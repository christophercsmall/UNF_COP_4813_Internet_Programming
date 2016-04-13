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
		header('Location: Login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>    
    <title>jQuery Course</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="Styles/Style.css">
    <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css">
    <script src="Scripts/bootstrap.js"></script>

    <script src="Scripts/jquery-1.10.2.js"></script>

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

        <div style="min-height:800px; margin-top:100px;">
            <div class="container-fluid">
                <center><h2 style="">jQuery Course</h2></center>
                <br />
                <!--====================================[Course Content]=====================================================================-->
                <div class="row" style="margin-bottom:100px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container">
                                <div class="col-md-6">
                                    <div class="jumbotron" style="min-height:700px;">
                                        <h3 id="sectionHeader" style="text-align:center;"></h3>
                                        <p id="sectionContentHTML"></p>
                                        <div style="margin:20px; padding-bottom:20px;">
                                            <input id="prevBtn" type="button" class="btn btn-success" value="< Previous" style="position:absolute; bottom:50px; left:50px; width:100px; height:50px;" />
                                            <input id="nextBtn" type="button" class="btn btn-success" value="Next >" style="position:absolute; bottom:50px; right:50px; width:100px; height:50px;" />
                                            <input id="quizBtn" onClick="window.location.href='AssessmentPage.php'" type="button" class="btn btn-info" value="Take Quiz" style="position:absolute; bottom:50px; right:50px; width:100px; height:50px;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jumbotron">
                                        <h3 id="exampleHeader" style="text-align:center;"></h3>
                                        <p id="exampleContentHTML"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=======================================[/Course Content]=======================================================================-->

            </div>
        </div>
    </div>
    <!--Content end here-->
	
<?php include 'Layout/Footer.php'; ?>

</body>
</html>

<script>
    $(function(){

        var sectionPageNum = 0;

        var sectionHeader = [
                    '<p>jQuery Course</p>',
                    '<p>jQuery Introduction</p>',
                    '<p>Adding jQuery</p>',
                    '<p>With jQuery, select (query) HTML elements to perform "actions" on them.</p>',
                    '<p>The Document Ready Event</p>',
                    '<p>jQuery Selectors</p>',
                    '<p>jQuery Method Events</p>',
        ];

        var sectionContent = [
            '<p>Click Next to begin.</p>',
            '<p>jQuery takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.</p> <p>jQuery also simplifies a lot of the complicated things from JavaScript, like AJAX calls and DOM manipulation.</p> <p>The jQuery library contains the following features:</p> <ul> <li>HTML/DOM manipulation</li> <li>CSS manipulation</li> <li>HTML event methods</li> <li>Effects and animations</li> <li>AJAX</li> <li>Utilities</li> </ul>',
            '<p>There are a few ways you can get started using jQuery in any HTML document.</p><br /><p>jQuery functions can be written within &lt;script&gt; tags in the &lt;head&gt; section of the document, or in an external file containing all of your functions which can be referenced as shown in the example. </p>',
            '<p><br />Basic syntax: $(selector).action()<br /><br /><ul><li>A $ sign to define/access jQuery</li><li>A (selector) to "query (or find)" HTML elements</li><li>A jQuery action() to be performed on the element(s)</li></ul></p>',
            '<p><p>This is to prevent any jQuery code from running before the document is finished loading (is ready).</p><p>It is good practice to wait for the document to be fully loaded and ready before working with it. This also allows you to have your JavaScript code before the body of your document, in the head section.</p><p>Here are some examples of actions that can fail if methods are run before the document is fully loaded:<ul><li>Trying to hide an element that is not created yet</li><li>Trying to get the size of an image that is not loaded yet</li></ul></p></p>',
            '<p>jQuery selectors are used to "find" (or select) HTML elements based on their id, classes, types, attributes, values of attributes and much more. <p>It is based on the existing CSS Selectors, and in addition, it has some own custom selectors.</p></p>',
            '<p><p>An event represents the precise moment when something happens.</p><p>Events are what drives the dynamic nature of web pages that use JavaScript and jQuery.</p><p>You can think of functions that use jQuery event methods as "listeners" because they listen for specific actions caused by the user.</p></p>',
        ];

        

        var exampleContent = [
            '<p><img class="img-responsive" src="Images/jquery-logo-1.png" /></p>',
            '<p><img class="img-responsive" src="Images/jquery-logo-1.png" /></p>',
            '<p style="font-size:small;"><br />&lt;script src="jquery-1.12.0.min.js"&gt;&lt;/script&gt;<br /><br />Or<br /><br />(Google)<br />&lt;script <br />src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"&gt;<br />&lt;/script&gt;<br /><br />(Microsoft)<br />&lt;script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"&gt;<br />&lt;/script&gt;<br /></p>',
            '<p>$(this).hide() - hides the current element.<br /><br />$("p").hide() - hides all &lt;p&gt; elements.<br /><br />$(".test").hide() - hides all elements with class="test".<br /><br />$("#test").hide() - hides the element with id="test".</p>',
            '<p>$(document).ready(function(){<br />   // jQuery methods go here...<br />});<br /><br />Or<br /><br />$(function(){<br />// jQuery methods go here...<br />});<br /></p>',
            '<p>You can select all &lt;p&gt; elements on a page like this:<p>$("p")</p><p>To select a differnt kind of element, just replace the "p" for any element tag you need to select.</p></p>',
            '<p><ul><li>Moving a mouse over an element</li><li>Selecting a radio button</li><li>Clicking on an element</li><li>Pressing a specific key on the keyboard</li><li>Typing characters into a text box</li></ul><br /><ul><li>dblclick()</li><li>mouseenter()</li><li>mouseleave()</li><li>mousedown()</li><li>mouseup()</li><li>hover()</li><li>focus()</li><li>blur()</li></ul></p>',
        ];
        
        var exampleHeader = [
            '<p></p>',
            '<p></p>',
            '<p>Example: Head Section</p>',
            '<p>Example: Select by Element</p>',
            '<p>Example: Document Ready</p>',
            '<p>Example: Selecting Elements with "p" Tag</p>',
            '<p>Example: Events and Event Methods</p>',
        ];

        $("#prevBtn").hide();
        $("#quizBtn").hide();
        loadSection();

        $("#nextBtn").click(function () {
            sectionPageNum++;

            loadSection();

            if (sectionPageNum == sectionContent.length -1) {
                $("#nextBtn").hide();
                $("#quizBtn").show();
            }
            if (sectionPageNum >= 0) {
                $("#prevBtn").show();
            }

        });

        $("#prevBtn").click(function () {
            sectionPageNum--;
            
            loadSection();

            if (sectionPageNum < sectionContent.length) {
                $("#nextBtn").show();
            }
            if (sectionPageNum == 0) {
                $("#prevBtn").hide();
                $("#quizBtn").hide();
            }
        });

        function loadSection() {
            $("#sectionHeader").html(sectionHeader[sectionPageNum]);
            $("#sectionContentHTML").html(sectionContent[sectionPageNum]);
            $("#exampleHeader").html(exampleHeader[sectionPageNum]);
            $("#exampleContentHTML").html(exampleContent[sectionPageNum]);
        };
    });
</script>
