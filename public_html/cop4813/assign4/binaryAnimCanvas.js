window.onload = function () {
	var today = new Date();
    document.getElementById("today").innerHTML = today.toDateString();
	
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
        var text = ' 1 1 0 0 0 0 0 0 1 0 1 0 1 0 0 0 0 1 1 0 0 1 0 0 0 1 0 0 0 0 1 0 ';
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
    function clrMsgText() {
        context.clearRect(0, 0, canvas.width, 450);
        context.fillStyle = 'grey';
        context.fillRect(0, 0, canvas.width, 450);
    }
    function drawRect(myRectangle, context) {
        context.beginPath();
        context.rect(myRectangle.x, myRectangle.y, myRectangle.width, myRectangle.height);
        context.fillStyle = 'black';
        context.fill();
        context.lineWidth = myRectangle.borderWidth;
        context.strokeStyle = '#00af00';
        context.stroke();
    }
    function drawRect2(myRectangle2, context) {
        context.beginPath();
        context.rect(myRectangle2.x, myRectangle2.y, myRectangle2.width, myRectangle2.height);
        context.fillStyle = 'black';
        context.fill();
        context.lineWidth = myRectangle2.borderWidth;
        context.strokeStyle = '#00af00';
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
        context.strokeStyle = 'black';
        context.lineWidth = 1;
        context.fillStyle = 'white';
        context.fillText(msg.text, msg.x, msg.y);
    }
    function drawClickTxt(clickTxt, context) {
        context.font = clickTxt.font;
        context.strokeStyle = 'black';
        context.lineWidth = 1;
        context.fillStyle = 'white';
        context.fillText(clickTxt.text, clickTxt.x, clickTxt.y);
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

        var clrImg = new Image();
        var img = new Image();        

        if (runCharSpkAnimation.value) {

            var currentX = char[4];            

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
            
            context.drawImage(img, newX, charSpk[5]);

            requestAnimFrame(setTimeout(function () {
                clrImage.x = newX;
                drawClrImg(clrImage, context);
                animateCharSpk(charSpk, runCharSpkAnimation, canvas, context);
            }, 75));

        }
    }
    function animateCharEnd(charEndAnim, runCharAnimationEnd, canvas, context) {
        if (runCharAnimationEnd.value) {

            var clrImg = new Image();
            var img = new Image();

            if (charEndAnim[4] >= canvas.width - 100) {
                charEndAnim[6] = "left";
            }
            if (charEndAnim[4] < 0) {
                charEndAnim[6] = "right";
            }

            if (charEndAnim[6] == "right") {
                if (charEndAnim[4] % 2 == 0) {
                    img.src = charEndAnim[1];
                }
                if (charEndAnim[4] % 5 == 0){
                    img.src = charEndAnim[0];
                }

                // pixels / second
                var linearSpeed = 10;
                var linearDistEachFrame = (linearSpeed * 200 / 1000);
                var currentX = charEndAnim[4];

                var newX = currentX + linearDistEachFrame;
                charEndAnim[4] = newX;

                context.drawImage(img, newX, charEndAnim[5]);
            }
            if (charEndAnim[6] == "left") {
                if (Math.floor(charEndAnim[4]) % 100 == 0) {
                    img.src = charEndAnim[3];
                }
                else {
                    img.src = charEndAnim[2];
                }

                // pixels / second
                var linearSpeed = 100;
                var linearDistEachFrame = linearSpeed * 200 / 1000;
                var currentX = charEndAnim[4];

                var newX = currentX - linearDistEachFrame;
                charEndAnim[4] = newX;

                context.drawImage(img, newX, charEndAnim[5]);
            }

            requestAnimFrame(function () {
                clrImage.x = newX;
                drawClrImg(clrImage, context);
                animateCharEnd(charEndAnim, runCharAnimationEnd, canvas, context);
            });
        }
    }

    var char = ['charR1.png', 'charR2.png', 'charL1.png', 'charL2.png', 0, 448, 'right'];
    var charSpk = ['charSpk1.png', 'charSpk2.png', 'charSpk3.png', 'charSpk4.png', 0, 448, 0];
    var charEndAnim = ['charR1.png', 'charR2.png', 'charL1.png', 'charL2.png', 0, 448, 'right'];

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
    var clickTxt = {
        x: 50,
        y: 50,
        font: '20pt Helvetica',
        text: 'Click: 1'
    }

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
        x: 450,
        y: 100,
        font: '20pt Helvetica',
        text: 'Network Addressing in Just 5 Clicks! : Click to begin.'
        
    };
    var octetRect = {
        x: 0 + 10,
        y: 549,        
        height: 50,
        width: (canvas.width / 4) - 10,
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
    var runCharAnimationEnd = {
        value: false
    }
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
                break;
            case 1:               
                runBinaryAnimation.value = true;
                runCharAnimation.value = false;
                runCharSpkAnimation.value = true;
                clrMsgText();
                msg.x = 100;
                msg.y = 400;
                msg.text = 'Oh! Hello there. Did you know that your IP address is actually just 1s and 0s?';
                drawMsg(msg, context);
                drawClickTxt(clickTxt, context);
                animateCharSpk(charSpk, runCharSpkAnimation, canvas, context);
                break;
            case 2:
                runCharSpkAnimation.value = true;
                runBinaryAnimation.value = false;
                clrMsgText();
                msg.text = 'It is True. See each group of 8 bits is called an Octet; the first 8 make the first number.';
                drawMsg(msg, context);
                clickTxt.text = 'Click: 2';
                drawClickTxt(clickTxt, context);
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
                clrMsgText();
                msg.text = 'Each bit has a "bit weight" which, when added up for each 1, will give you that octet for your IP.';
                drawMsg(msg, context);
                clickTxt.text = 'Click: 3';
                drawClickTxt(clickTxt, context);
                drawOctetRect(octetRect, context);
                drawOctTxt(octetTxt, context);
                drawBitWeights(bitWeights, context);
                break;
            case 4:
                clrMsgText();
                msg.text = 'Here is the IP for my server. Just add periods between each number and your good to go!';
                drawMsg(msg, context);
                clickTxt.text = 'Click: 4';
                drawClickTxt(clickTxt, context);
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
                clrMsgText();
                clickTxt.text = 'Click: 5';
                drawClickTxt(clickTxt, context);                
                msg.text = 'The End.          Thanks for the visit.  :)  I will be here on the server if you need me.';
                drawMsg(msg, context);
                runCharSpkAnimation.value = false;
                runCharAnimationEnd.value = true;
                animateCharEnd(charEndAnim, runCharAnimationEnd, canvas, context);
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