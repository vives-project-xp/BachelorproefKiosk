<!DOCTYPE html>
<?php
/*
Template Name: snake
*/
?>
<html>
<head>
  <title>Snake</title>
  <style>
   
   html, body {
    height: 100%;
    margin: 0;
  }

  body {
    background: black;
    align-items: center;
    justify-content: center;
  }
  canvas {
    border: 1px solid white;
    width: 80vmin;
    height: 80vmin;
    margin-left: 30%;
    cursor: none;
}
@media screen and (max-width: 1100px) {
    canvas {
        width: 90vmin;
        height: 90vmin;
        margin-left: 5%;
        margin-top: 10%;
    }
}
  
  #score_display {
    width: min-content;
    text-wrap: nowrap;
    font-size: 20px;
  }

  #highscore_display {
    width: min-content;
    text-wrap: nowrap;
    font-size: 20px;
  }

  </style>
  <?php wp_head();?>
  <script type="text/javascript" src="<?php echo get_partone_url() ?>/recourses/js/Disable_scroll.js" defer></script>
</head>
<body <?php body_class();?>>
    <div class="topbar" type="navbar">
        <ul>
            <li><a href="<?php echo get_link_page("page-menu.php") ?>">.Home</a></li>
            <li><p id="score_display"></p> </li>
            <li><p id="highscore_display"></p></li>
            <li><a href="<?php echo get_link_page("page-game.php") ?>">.Game</a></li>
        </ul>
        <img class="topbarimg" src="<?php echo get_partone_url() ?>/recourses/images/shells.gif">
    </div>

<canvas width="600" height="600" id="game"></canvas>
<script>
var canvas = document.getElementById('game');
var context = canvas.getContext('2d');

var grid = 16;
var count = 0;
  
var score = 0;
var highscore = localStorage.getItem("highscore") || 0; // Check local storage or set default to 0

function ShowScore(score) {
  document.getElementById("score_display").textContent = `Score: ${score}`;
}

function getHighscore(score) {
  if (highscore === null || score >= highscore) { // Check for null or higher score
    highscore = score;
    localStorage.setItem("highscore", highscore); // Update local storage
  }
  document.getElementById("highscore_display").textContent = `Highscore: ${highscore}`;
}

var snake = {
  x: 160,
  y: 160,
  
  // snake velocity. moves one grid length every frame in either the x or y direction
  dx: grid,
  dy: 0,
  
  // keep track of all grids the snake body occupies
  cells: [],
  
  // length of the snake. grows when eating an apple
  maxCells: 4
};
var apple = {
  x: 320,
  y: 320
};

// get random whole numbers in a specific range
// @see https://stackoverflow.com/a/1527820/2124254
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

// game loop
function loop() {
  requestAnimationFrame(loop);

  // slow game loop to 15 fps instead of 60 (60/15 = 4)
  if (++count < 4) {
    return;
  }

  count = 0;
  context.clearRect(0,0,canvas.width,canvas.height);

  // move snake by it's velocity
  snake.x += snake.dx;
  snake.y += snake.dy;

  // wrap snake position horizontally on edge of screen
  /*
  if (snake.x < 0) {
    snake.x = canvas.width - grid;
  }
  else if (snake.x >= canvas.width) {
    snake.x = 0;
  }
  */
 if (snake.x < 0) {
    snake.x = 160;
        snake.y = 160;
        snake.cells = [];
        snake.maxCells = 4;
        snake.dx = grid;
        snake.dy = 0;

        apple.x = getRandomInt(0, 25) * grid;
        apple.y = getRandomInt(0, 25) * grid;
        score= 0;
        ShowScore(score);
  }
    else if (snake.x >= canvas.width) {
        snake.x = 160;
            snake.y = 160;
            snake.cells = [];
            snake.maxCells = 4;
            snake.dx = grid;
            snake.dy = 0;
    
            apple.x = getRandomInt(0, 25) * grid;
            apple.y = getRandomInt(0, 25) * grid;
            score= 0;
            ShowScore(score);
    }
  

  // wrap snake position vertically on edge of screen
  /*
  if (snake.y < 0) {
    snake.y = canvas.height - grid;
  }
  else if (snake.y >= canvas.height) {
    snake.y = 0;
  }
  */
 if (snake.y < 0) {
    snake.x = 160;
        snake.y = 160;
        snake.cells = [];
        snake.maxCells = 4;
        snake.dx = grid;
        snake.dy = 0;

        apple.x = getRandomInt(0, 25) * grid;
        apple.y = getRandomInt(0, 25) * grid;
        score = 0;
        ShowScore(score);
  }
    else if (snake.y >= canvas.height) {
        snake.x = 160;
            snake.y = 160;
            snake.cells = [];
            snake.maxCells = 4;
            snake.dx = grid;
            snake.dy = 0;
    
            apple.x = getRandomInt(0, 25) * grid;
            apple.y = getRandomInt(0, 25) * grid;
            score = 0;
            ShowScore(score);
    }

  // keep track of where snake has been. front of the array is always the head
  snake.cells.unshift({x: snake.x, y: snake.y});

  // remove cells as we move away from them
  if (snake.cells.length > snake.maxCells) {
    snake.cells.pop();
  }

  // draw apple
  context.fillStyle = 'red';
  context.fillRect(apple.x, apple.y, grid-1, grid-1);

  // draw snake one cell at a time
  context.fillStyle = 'green';
  snake.cells.forEach(function(cell, index) {
    
    // drawing 1 px smaller than the grid creates a grid effect in the snake body so you can see how long it is
    context.fillRect(cell.x, cell.y, grid-1, grid-1);  

    // snake ate apple
    if (cell.x === apple.x && cell.y === apple.y) {
      snake.maxCells++;
      score++;
      ShowScore(score);
      getHighscore(score)

      // canvas is 400x400 which is 25x25 grids 
      apple.x = getRandomInt(0, 25) * grid;
      apple.y = getRandomInt(0, 25) * grid;
    }

    // check collision with all cells after this one (modified bubble sort)
    for (var i = index + 1; i < snake.cells.length; i++) {
      
      // snake occupies same space as a body part. reset game
      if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
        snake.x = 160;
        snake.y = 160;
        snake.cells = [];
        snake.maxCells = 4;
        snake.dx = grid;
        snake.dy = 0;

        apple.x = getRandomInt(0, 25) * grid;
        apple.y = getRandomInt(0, 25) * grid;
        score = 0;
        document.getElementById("score_display").textContent = score;
      }
    }
  });
}

// listen to keyboard events to move the snake
document.addEventListener('keydown', function(e) {
  // prevent snake from backtracking on itself by checking that it's 
  // not already moving on the same axis (pressing left while moving
  // left won't do anything, and pressing right while moving left
  // shouldn't let you collide with your own body)
  
  // left arrow key
  if (e.which === 37 && snake.dx === 0) {
    snake.dx = -grid;
    snake.dy = 0;
  }
  // up arrow key
  else if (e.which === 38 && snake.dy === 0) {
    snake.dy = -grid;
    snake.dx = 0;
  }
  // right arrow key
  else if (e.which === 39 && snake.dx === 0) {
    snake.dx = grid;
    snake.dy = 0;
  }
  // down arrow key
  else if (e.which === 40 && snake.dy === 0) {
    snake.dy = grid;
    snake.dx = 0;
  }
});

// start the game
requestAnimationFrame(loop);
</script>
<?php wp_footer();?>
</body>
</html>
