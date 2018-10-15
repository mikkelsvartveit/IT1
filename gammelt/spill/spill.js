var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
var ballRadius = 20;
var x = canvas.width / 2;
var y = canvas.height / 2 - 20;
var dx = 2;
var dy = 2;
var color = "teal"
var paddleHeight = 10;
var paddleWidth = 75;
var paddleX = (canvas.width - paddleWidth) / 2;
var maxSpeed = 100000000;

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function drawBall() {
    ctx.beginPath();
    ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
    ctx.fillStyle = color;
    ctx.fill();
    ctx.closePath();
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawBall();

    if (x + dx > canvas.width - ballRadius || x + dx < ballRadius) {
        dx = -dx;
        color = getRandomColor();

        if (Math.abs(dx) < maxSpeed) {
            if (dx > 0) {
                dx += 1;
            } else {
                dx -= 1;
            }
        }

        if (Math.abs(dy) < maxSpeed) {
            if (dy > 0) {
                dy += 1;
            } else {
                dy -= 1;
            }
        }
    }
    if (y + dy > canvas.height - ballRadius || y + dy < ballRadius) {
        dy = -dy;
        color = getRandomColor();

        if (Math.abs(dx) < maxSpeed) {
            if (dx > 0) {
                dx += 1;
            } else {
                dx -= 1;
            }
        }

        if (Math.abs(dy) < maxSpeed) {
            if (dy > 0) {
                dy += 1;
            } else {
                dy -= 1;
            }
        }
    }

    x += dx;
    y += dy;
}

drawBall();

var interval;

function run() {
    if (!interval) {
        interval = setInterval(draw, 20);
    } else {
        clearInterval(interval);
        interval = null;
    }
}
