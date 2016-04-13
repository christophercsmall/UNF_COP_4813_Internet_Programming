<?php
session_start();

//Redirect if logged in
if($_SESSION['Email'] != null)
{
	header('Location: UserAccount.php');
	exit;  
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

    <script>
        var questions = [];
        var userAnswers = [];
        var key = [];
        var temp = "";
        var answerA, answerB, answerC, answerD = [];
        var counter = 0;
        var points = 0;

        window.onload = function () {
            var q1 = 'Which will select all paragraph elements?';
            var q2 = 'Which of the following is correct?';
            var q3 = 'jQuery uses ___ selectors to select elements?';
            var q4 = 'Which sign does jQuery use as a shortcut for jQuery?';
            var q5 = 'Is jQuery a library for client scripting or server scripting?';
            var q6 = 'What is the correct jQuery code to set the background color of all p elements to red?';
            var q7 = 'Which jQuery method is used to hide selected elements?';
            var q8 = 'What is the correct jQuery code for making all div elements 100 pixels high?';
            var q9 = 'Which statement is true?';
            var q10 = 'What scripting language is jQuery written in?';
            questions = [q1, q2, q3, q4, q5, q6, q7, q8, q9, q10];
            key = ['A', 'B', 'C', 'D', 'B', 'A', 'D', 'B', 'C', 'C'];

            answerA = ['$("p")', 'jQuery is a JSON Library', 'JavaScript', 'The & sign', 'Server Scripting', '$("p").css("background-color","red");', 'visible(false)', '$("div").yPos(100)', 'To use jQuery, you do not have to do anything. <br />Most browsers (Internet Explorer, Chrome, Firefox and Opera) have the jQuery library built in the browser', 'VBScript'];
            answerB = ['$["p"]', 'jQuery is a JavaScript Library', 'SQL', 'The % sign', 'Client Scripting', '$("p").layout("background-color","red");', 'hidden()', '$("div").height(100)', 'To use jQuery, you do not have to do anything. <br />jQuery is loaded into the browser every time a web site is visited', 'C#'];
            answerC = ['$(p)', 'jQuery is an HTML5 Library', 'CSS', 'The ? sign', 'Both', '$("p").manipulate("background-color","red");', 'display(none)', '$("div").height="100"', 'To use jQuery, you can refer to a hosted jQuery library at Google', 'JavaScript'];
            answerD = ['($"p")', 'jQuery is an SQL Library', 'XML', 'The $ sign', 'Neither', '$("p").style("background-color","red");', 'hide()', '$(“div”).style(“height=100”)', 'To use jQuery, you must buy the jQuery library at www.jquery.com', 'C++'];

            questionAnswers = [answerA, answerB, answerC, answerD]
            
            loadNextQuestion();
        }

        function enableSubmitBtn(val) {
            document.getElementById("submit").style.display = "";
            temp = val;
        }

        function submitAnswer() {
            userAnswers.push(temp);
            document.getElementById("submit").style.display = "none";
            counter++;
            if (counter == questions.length) {
                gradeTest();
                alert("test over");
            }
            loadNextQuestion();
        }

        function loadNextQuestion() {

            document.getElementById("question").innerHTML = questions[counter];
            document.getElementById("ansA").innerHTML = questionAnswers[0][counter];
            document.getElementById("ansB").innerHTML = questionAnswers[1][counter];
            document.getElementById("ansC").innerHTML = questionAnswers[2][counter];
            document.getElementById("ansD").innerHTML = questionAnswers[3][counter];
        }

        function gradeTest() {
            for (var x = 0; x < questions.length; x++) {
                if (userAnswers[x] == key[x]) {
                    points++;
                }
            }
            alert("you got " + points + " points.");
            window.location.href = 'Home.php';
        }

    </script>

</head>

<body style="overflow-x:hidden">

<?php include 'Layout/Header.php'; ?>
    <!-- Page Content starts here-->

    <div class="body-content" style="background-image:url('Images/BGImage1.jpg');
        background-size: 2000px 2000px">

        <div style="height:100px"></div>
        <div style="min-height:800px;">
            <div class="container-fluid">
                <center><h2>Assessment</h2></center>
                <br />

                <div class="col-md-2"></div>
                <div class="col-md-10">

<!--========================================================Test Questions=====================================================================-->

                    <div class="form-horizontal" role="form">

                        <div class="form-group">
                            <p class="lead">
                                <a href="#">Test # </a>
                            </p>
                        </div>

                        <div class="form-group">
                            <p><span class="glyphicon glyphicon-time"></span> Test Timer</p>
                        </div>

                        <div class="form-group">
                            <p id="question" class="lead">The Question goes here.</p>
                        </div>

                        <div class="form-group">
                            <div class="btn-group btn-group-vertical btn-group-lg" style="width:inherit;">
                                <button name="radio" type="button" onclick="enableSubmitBtn(this.value)"
                                        value="A" class="btn btn-default" style="text-align:left;">
                                    A: <span id="ansA">
                                    </span>
                                </button>
                                <button name="radio" type="button" onclick="enableSubmitBtn(this.value)" value="B"
                                        class="btn btn-default" style="text-align:left;">
                                    B: <span id="ansB">
                                    </span>
                                </button>
                                <button name="radio" type="button" onclick="enableSubmitBtn(this.value)" value="C"
                                        class="btn btn-default" style="text-align:left;">
                                    C: <span id="ansC">
                                    </span>
                                </button>
                                <button name="radio" type="button" onclick="enableSubmitBtn(this.value)" value="D"
                                        class="btn btn-default" style="text-align:left;">
                                    D: <span id="ansD">
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <button id="submit" type="button" onclick="submitAnswer()"
                                    class="btn-success btn-lg" value="Submit" style="display:none">
                                Submit
                            </button>
                        </div>
                    </div>
<!--========================================================/Test Questions=====================================================================-->

                </div>
            </div>

        </div>
    </div>

    <!-- Page Content ends here-->
   <?php include 'Layout/Footer.php'; ?>

</body>

</html>