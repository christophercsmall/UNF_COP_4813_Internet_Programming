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
    function clrText() {
        context.beginPath();
        context.rect(clrRect.x, clrRect.y, clrRect.width, clrRect.height);
        context.fillStyle = 'black';
        context.fill();
        context.lineWidth = myRectangle.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
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
    function drawOctetRect(octetRect, context) {
        context.beginPath();
        context.rect(octetRect.x, octetRect.y, octetRect.width, octetRect.height);
        context.lineWidth = octetRect.borderWidth;
        context.strokeStyle = 'red';
        context.stroke();
    }
    function drawClrImg(clrImage, context) {
        context.beginPath();
        context.rect(clrImage.x, clrImage.y, clrImage.width, clrImage.height);
        context.fillStyle = 'grey';
        context.fill();
    }
    function drawMsg(msg, context) {
        context.font = msg.font;
        context.fillStyle = '#00af00';
        context.fillText(msg.text, msg.x, msg.y);
    }
    function drawOctTxt(octetTxt, context) {
        context.font = 'bold 30pt Courier New';
        context.strokeStyle = 'black';
        context.lineWidth = 1;
        context.strokeText(octetTxt.text, octetTxt.x, octetTxt.y);
        context.fillStyle = '#00af00';
        context.fillText(octetTxt.text, octetTxt.x, octetTxt.y);
        context.lineCap = 'round';
    }
    function drawBitWeights(bitWeights, context) {
        context.font = 'bold 12pt Courier New';
        context.strokeStyle = 'black';
        context.lineWidth = 3;
        context.strokeText(bitWeights.text, bitWeights.x, bitWeights.y);
        context.fillStyle = 'white';
        context.fillText(bitWeights.text, bitWeights.x, bitWeights.y);
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

    function animate(lastTime, myRectangle, runBinaryAnimation, canvas, context) {
        if (runBinaryAnimation.value) {
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
                animate(time, myRectangle, runBinaryAnimation, canvas, context);

            });

        }
    }
    function animate2(lastTime, myRectangle2, runBinaryAnimation, canvas, context) {
        if (runBinaryAnimation.value) {
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
                animate2(time, myRectangle2, runBinaryAnimation, canvas, context);

            });

        }
    }
    function txtAnimate(lastTime, myText, runBinaryAnimation, canvas, context) {
        if (runBinaryAnimation.value) {
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
                txtAnimate(time, myText, runBinaryAnimation, canvas, context);

            });

        }
    }
    function txtAnimate2(lastTime, myText2, runBinaryAnimation, canvas, context) {
        if (runBinaryAnimation.value) {
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
                txtAnimate2(time, myText2, runBinaryAnimation, canvas, context);

            });

        }
    }
    function animateChar(lastTime, char, runCharAnimation, canvas, context) {
        if (runCharAnimation.value) {
           
            var clrImg = new Image();
            var img = new Image();            
            
            if (char[4] >= canvas.width - 100) {
                char[6] = "left";                                
            }
            if (char[4] < 0) {
                char[6] = "right";
            }

            if (char[6] == "right") {
                if (Math.floor(char[4]) % 2 == 0) {
                    img.src = char[1];
                }
                else {
                    img.src = char[0];
                }

                var time = (new Date()).getTime();
                var timeDiff = time - lastTime;

                // pixels / second
                var linearSpeed = 100;
                var linearDistEachFrame = linearSpeed * timeDiff / 1000;
                var currentX = char[4];

                var newX = currentX + linearDistEachFrame;
                char[4] = newX;

                clrImage.x = newX;

                drawClrImg(clrImage, context);
                context.drawImage(img, newX, char[5]);
            }
            if (char[6] == "left") {
                if (Math.floor(char[4]) % 2 == 0) {
                    img.src = char[3];
                }
                else {
                    img.src = char[2];
                }

                var time = (new Date()).getTime();
                var timeDiff = time - lastTime;

                // pixels / second
                var linearSpeed = 100;
                var linearDistEachFrame = linearSpeed * timeDiff / 1000;
                var currentX = char[4];

                var newX = currentX - linearDistEachFrame;
                char[4] = newX;

                clrImage.x = newX;

                drawClrImg(clrImage, context);
                context.drawImage(img, newX, char[5]);
            }

            requestAnimFrame(function () {
                animateChar(time, char, runCharAnimation, canvas, context);
            });
        }
    }
    function animateCharSpk(charSpk, runCharSpkAnimation, canvas, context) {        
        
        if (runCharSpkAnimation.value) {

            var currentX = char[4];

            var clrImg = new Image();
            var img = new Image();

            switch (charSpk[6]) {
                case 0:
                    img.src = charSpk[0];
                    charSpk[6] = 1;
                    break;
                case 1:
                    img.src = charSpk[1];
                    charSpk[6] = 2;
                    break;
                case 2:
                    img.src = charSpk[2];
                    charSpk[6] = 3;
                    break;
                case 4:
                    img.src = charSpk[3];
                    charSpk[6] = 0;
                    break;
            }

            if (charSpk[6] == 3) {
                charSpk[6] = 0;
            }

            var newX = currentX;

            clrImage.x = newX;
            drawClrImg(clrImage, context);
            context.drawImage(img, newX, charSpk[5]);

            requestAnimFrame(setTimeout(function () {
                animateCharSpk(charSpk, runCharSpkAnimation, canvas, context);
            }, 125));

        }
    }

    var char = ['../img/charR1.png', '../img/charR2.png', '../img/charL1.png', '../img/charL2.png', 0, 450, 'right'];
    var charSpk = ['../img/charSpk1.png', '../img/charSpk2.png', '../img/charSpk3.png', '../img/charSpk4.png', 0, 450, 0];

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
    var clrRect = {
        x: 0,
        y: 549,
        width: canvas.width,
        height: 50,
        borderWidth: 1
    }
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
    var clrImage = {
        x: 0,
        y: 448,
        width: 100,
        height: 100,
    };
    var msg = {
        x: (canvas.width / 2),
        y: (canvas.height / 2),
        font: '20pt Helvetica',
        text: 'Click to begin.'
    };
    var octetRect = {
        x: 0 + 10,
        y: 549,        
        height: 50,
        width: (canvas.width / 4),
        borderWidth: 3,
    };
    var octetTxt = {
        x: (octetRect.width / 2) - 20,
        y: 675,
        text: '192'
    }
    var bitWeights = {
        x: 0 + 20,
        y: 625,
        text: '128 + 64 + 32 + 16 + 8  + 4  + 2 +  0'
    }
    
    var clicks = -1;

    /*
     * define the runCharAnimation boolean as an obect
     * so that it can be modified by reference
     */
    var runCharAnimation = {
        value: false
    };
    var runBinaryAnimation = {
        value: false
    };
    var runCharSpkAnimation = {
        value: false
    };

    // add click listener to canvas
    document.getElementById('myCanvas').addEventListener('click', function () {
        
        // flip flag
        clicks += 1;
        switch (clicks) {
            case 0:
                var date = new Date();
                var time = date.getTime();
                runBinaryAnimation.value = true;
                runCharAnimation.value = true;
                runCharSpkAnimation.value = false;
                animate(time, myRectangle, runBinaryAnimation, canvas, context);
                animate2(time, myRectangle2, runBinaryAnimation, canvas, context);
                txtAnimate(time, myText, runBinaryAnimation, canvas, context);
                txtAnimate2(time, myText2, runBinaryAnimation, canvas, context);
                animateChar(time, char, runCharAnimation, canvas, context);
                context.save();

                break;
            case 1:               
                runBinaryAnimation.value = true;
                runCharAnimation.value = false;
                runCharSpkAnimation.value = true;
                animateCharSpk(charSpk, runCharSpkAnimation, canvas, context);
                break;
            case 2:
                runCharSpkAnimation.value = true;
                runBinaryAnimation.value = false;
                clrText();
                myRectangle.x = 0;
                myRectangle.y = 549;
                myRectangle2.x = -(canvas.width);
                myRectangle2.y = canvas.width;
                myText.x = 0;
                myText.y = 585;
                myText2.x = -(canvas.width);
                myText2.y = 585;
                drawText(myText, context);
                drawText2(myText2, context);
                break;
            case 3:
                drawOctetRect(octetRect, context);
                drawOctTxt(octetTxt, context);
                drawBitWeights(bitWeights, context);
                break;
            case 4:
                octetRect.x += (octetRect.width + 5)
                drawOctetRect(octetRect, context);
                octetRect.x += (octetRect.width + 5)
                drawOctetRect(octetRect, context);
                octetRect.x += (octetRect.width + 5)
                drawOctetRect(octetRect, context);
                octetTxt.x += (canvas.width /4);
                octetTxt.text = '168';
                drawOctTxt(octetTxt, context);
                octetTxt.x += (canvas.width / 4);
                octetTxt.text = '100';
                drawOctTxt(octetTxt, context);
                octetTxt.x += (canvas.width / 4);
                octetTxt.text = '66';
                drawOctTxt(octetTxt, context);
                break;
            case 5:
                canvas.width = canvas.width;
                break;

        }
        
    });

    styleCanvas(canvasBackground, context);
    drawRect(myRectangle, context);
    drawRect2(myRectangle2, context);
    drawText(myText, context);
    drawText2(myText2, context);
    drawMsg(msg, context);
    document.getElementById('myCanvas').click();
};