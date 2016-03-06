window.onload = function () {

    var canvas = document.getElementById('myCanvas');
    var context = canvas.getContext('2d');

    window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };

    })();

    canvasWidth();

    function canvasWidth() {
        var canvas = document.getElementsByTagName('canvas')[0];
        context.font = 'bold 30pt Courier New';
        var text = ' 1 1 0 0 0 0 0 0 1 0 1 0 1 0 0 0 0 1 1 0 0 1 0 0 0 1 0 0 0 0 1 0';
        var width = context.measureText(text).width;
        canvas.width = width;
    }

    function drawText(myText, context) {
        context.font = 'bold 30pt Courier New';
        context.fillStyle = '#00af00';
        context.fillText(' 1 1 0 0 0 0 0 0 1 0 1 0 1 0 0 0 0 1 1 0 0 1 0 0 0 1 0 0 0 0 1 0', myText.x, myText.y);
        context.lineCap = 'round';
    }
    function drawText2(myText2, context) {
        context.font = 'bold 30pt Courier New';
        context.fillStyle = '#00af00';
        context.fillText(' 1 1 0 0 0 0 0 0 1 0 1 0 1 0 0 0 0 1 1 0 0 1 0 0 0 1 0 0 0 0 1 0', myText2.x, myText2.y);
        context.lineCap = 'round';
    }
    function drawRect(myRectangle, context) {
        context.beginPath();
        context.rect(myRectangle.x, myRectangle.y, myRectangle.width, myRectangle.height);
        context.fillStyle = 'black';
        context.fill();
        context.lineWidth = myRectangle.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
    }
    function drawRect2(myRectangle2, context) {
        context.beginPath();
        context.rect(myRectangle2.x, myRectangle2.y, myRectangle2.width, myRectangle2.height);
        context.fillStyle = 'black';
        context.fill();
        context.lineWidth = myRectangle2.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
    }

    function styleCanvas(canvasBackground, context) {
        context.beginPath();
        context.rect(canvasBackground.x, canvasBackground.y, canvasBackground.width, canvasBackground.height);
        context.fillStyle = 'grey';
        context.fill();
        context.lineWidth = canvasBackground.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
    }

    function animate(lastTime, myRectangle, runAnimation, canvas, context) {
        if (runAnimation.value) {
            // update
            var time = (new Date()).getTime();
            var timeDiff = time - lastTime;

            // pixels / second
            var linearSpeed = 500;
            var linearDistEachFrame = linearSpeed * timeDiff / 1000;
            var currentX = myRectangle.x;

            //if(currentX < canvas.width - myRectangle.width - myRectangle.borderWidth / 2) {
            //  var newX = currentX + linearDistEachFrame;
            //  myRectangle.x = newX;
            //}
            var newX = currentX + linearDistEachFrame;
            myRectangle.x = newX;

            // clear
            //context.clearRect(0, 0, canvas.width, canvas.height);

            // draw
            drawRect(myRectangle, context);

            if (myRectangle.x > canvas.width) {
                myRectangle.x = -(canvas.width);
            }
            // request new frame
            requestAnimFrame(function () {
                animate(time, myRectangle, runAnimation, canvas, context);

            });

        }
    }
    function animate2(lastTime, myRectangle2, runAnimation, canvas, context) {
        if (runAnimation.value) {
            // update
            var time = (new Date()).getTime();
            var timeDiff = time - lastTime;

            // pixels / second
            var linearSpeed = 500;
            var linearDistEachFrame = linearSpeed * timeDiff / 1000;
            var currentX = myRectangle2.x;

            //if(currentX < canvas.width - myRectangle.width - myRectangle.borderWidth / 2) {
            //  var newX = currentX + linearDistEachFrame;
            //  myRectangle.x = newX;
            //}
            var newX = currentX + linearDistEachFrame;
            myRectangle2.x = newX;

            // clear
            //context.clearRect(0, 0, canvas.width, canvas.height);

            // draw
            drawRect2(myRectangle2, context);

            if (myRectangle2.x > canvas.width) {
                myRectangle2.x = -(canvas.width);
            }
            // request new frame
            requestAnimFrame(function () {
                animate2(time, myRectangle2, runAnimation, canvas, context);

            });

        }
    }
    function txtAnimate(lastTime, myText, runAnimation, canvas, context) {
        if (runAnimation.value) {
            // update
            var time = (new Date()).getTime();
            var timeDiff = time - lastTime;

            // pixels / second
            var linearSpeed = 500;
            var linearDistEachFrame = linearSpeed * timeDiff / 1000;
            var currentX = myText.x;

            //if(currentX < canvas.width - myRectangle.width - myRectangle.borderWidth / 2) {
            //  var newX = currentX + linearDistEachFrame;
            //  myRectangle.x = newX;
            //}
            var newX = currentX + linearDistEachFrame;
            myText.x = newX;

            // clear
            //context.clearRect(0, 0, canvas.width, canvas.height);

            // draw
            drawText(myText, context);

            if (myText.x > canvas.width) {
                myText.x = -(canvas.width);
            }
            // request new frame
            requestAnimFrame(function () {
                txtAnimate(time, myText, runAnimation, canvas, context);

            });

        }
    }
    function txtAnimate2(lastTime, myText2, runAnimation, canvas, context) {
        if (runAnimation.value) {
            // update
            var time = (new Date()).getTime();
            var timeDiff = time - lastTime;

            // pixels / second
            var linearSpeed = 500;
            var linearDistEachFrame = linearSpeed * timeDiff / 1000;
            var currentX = myText2.x;


            var newX = currentX + linearDistEachFrame;
            myText2.x = newX;

            // clear
            //context.clearRect(0, 0, canvas.width, canvas.height);

            // draw
            drawText2(myText2, context);

            if (myText2.x > canvas.width) {
                myText2.x = -(canvas.width);
            }
            // request new frame
            requestAnimFrame(function () {
                txtAnimate2(time, myText2, runAnimation, canvas, context);

            });

        }
    }
    var char = ['../img/charR1.png', '../img/charR2.png', 0, 450];

    function animateChar(lastTime, char, runAnimation, canvas, context) {
        var img = new Image();
        img.src = char[0];

        var time = (new Date()).getTime();
        var timeDiff = time - lastTime;

        // pixels / second
        var linearSpeed = 500;
        var linearDistEachFrame = linearSpeed * timeDiff / 1000;
        var currentX = char[2];

        var newX = currentX + linearDistEachFrame;
        char[2] = newX;

        context.drawImage(img, newX, 450);        

        requestAnimFrame(function () {
            animateChar(time, char, runAnimation, canvas, context);

        });
        
    }

    var myRectangle = {
        x: 0,
        y: 549,
        width: canvas.width,
        height: 50,
        borderWidth: 1
    };
    var myRectangle2 = {
        x: -(canvas.width),
        y: 549,
        width: canvas.width,
        height: 50,
        borderWidth: 1
    };
    var myText = {
        x: 0,
        y: 585
    };
    var myText2 = {
        x: -(canvas.width),
        y: 585
    };

    var canvasBackground = {
        x: 0,
        y: 0,
        width: canvas.width,
        height: canvas.height,
        borderWidth: 1
    };

    

    /*
     * define the runAnimation boolean as an obect
     * so that it can be modified by reference
     */
    var runAnimation = {
        value: false
    };

    // add click listener to canvas
    document.getElementById('myCanvas').addEventListener('click', function () {
        // flip flag
        runAnimation.value = !runAnimation.value;
        if (runAnimation.value) {
            var date = new Date();
            var time = date.getTime();
            animate(time, myRectangle, runAnimation, canvas, context);
            animate2(time, myRectangle2, runAnimation, canvas, context);
            txtAnimate(time, myText, runAnimation, canvas, context);
            txtAnimate2(time, myText2, runAnimation, canvas, context);
            animateChar(time, char, runAnimation, canvas, context);
        }
    });

    styleCanvas(canvasBackground, context);
    drawRect(myRectangle, context);
    drawRect2(myRectangle2, context);
    drawText(myText, context);
    drawText2(myText2, context);


};