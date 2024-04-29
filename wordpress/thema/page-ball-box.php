<!DOCTYPE html>
<?php
/*
Template Name: ball box
*/
?>
<html>
<head>
  <title>Ball-Box</title>
  <?php wp_head();?>
  <script type="text/javascript" src="wp-content/themes/thema/recourses/js/Disable_scroll.js" defer></script>
</head>
<style>
    .container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.title {
  text-align: center;
  margin-bottom: 20px;
  font-size: 48px;
  color: #333333; 
  text-shadow: 2px 2px 4px rgba(255, 0, 0, 0.886);
}

#box {
  width: 400px;
  height: 400px;
  background-color: lightgoldenrodyellow;
  position: relative;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); 
  border-radius: 10px; 
  overflow: hidden; 
  cursor: none;
}

#ball {
  width: 30px;
  height: 30px;
  background-color:green;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
  border-radius: 50%;
  position: absolute;

}

.mine {
  width: 20px;
  height: 20px;
  background-color: black;
  position: absolute;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
  border-radius: 0;
  animation: mineAnimation 1s infinite alternate;
}

@keyframes mineAnimation {
  from {
    transform: scale(0.8);
  }
  to {
    transform: scale(1.2);
  }
}

.food-item {
  width: 25px;
  height: 25px;
  background-color: rgb(255, 136, 0);
  position: absolute;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
  border-radius: 50%;
  animation: foodAnimation 1s infinite alternate;
}

@keyframes foodAnimation {
  from {
    transform: scale(1);
  }
  to {
    transform: scale(1.2);
  }
}

#lives,
#score,
#message-display {
  font-weight: bold;
  font-size: 20px;
  margin-top: 10px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

#lives {
  color: #ffff;
}

#score {
  color: #ffff;
}

#message-display {
  color: #f80800;
}

#reset-button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 20px;
  border: 2px solid #00ff08; 
  border-radius: 4px;
  cursor: pointer;
  margin-top: 20px;
  transition: background-color 0.3s ease;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
}

#reset-button:hover {
  background-color: #377035;
}

#reset-button:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
}
</style>
<body <?php body_class();?>>
  <div class="container">
    <div class="topbar" type="navbar">
        <ul>
            <li><a href="<?php echo get_link_page("page-menu.php") ?>">.Home</a></li>
            <li><p id="score_display"></p> </li>
            <li><p id="highscore_display"></p></li>
            <li><a href="<?php echo get_link_page("page-game.php") ?>">.Game</a></li>
        </ul>
        <img class="topbarimg" src="wp-content/themes/thema/recourses/images/shells.gif">
    </div>
    <div id="box">
      <div id="ball"></div>
    </div>
    <div id="lives">🌟 Lives: <span id="lives-count">3</span></div>
    <div id="score">🍪 Munchies Consumed: <span id="score-count">0</span></div>
    <div id="message-display"></div>
    <button id="reset-button">Reset Odyssey</button>
  </div>
  <?php wp_footer();?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
  const box = document.getElementById("box");
  const ball = document.getElementById("ball");
  const livesCount = document.getElementById("lives-count");
  const scoreCount = document.getElementById("score-count");
  const messageDisplay = document.getElementById("message-display");
  const resetButton = document.getElementById("reset-button");

  let boxWidth, boxHeight, ballWidth, ballHeight;
  let ballX, ballY;
  let lives = 3; // Initial number of lives
  let score = 0; // Initial score
  let count = 0;
  let foodItem;
  let gameActive = true;

  // Function to generate random coordinates within the box boundaries
  function generateRandomCoordinates() {
    let x, y;
    do {
      x = Math.floor(Math.random() * (boxWidth - 20));
      y = Math.floor(Math.random() * (boxHeight - 20));
    } while (
      Math.abs(x - ballX) <= ballWidth && Math.abs(y - ballY) <= ballHeight
    ); // Exclude the ball's initial position
    return { x, y };
  }

  // Function to generate mines
  function generateMines() {
    // Clear existing mines
    const existingMines = document.querySelectorAll(".mine");
    existingMines.forEach((mine) => {
      box.removeChild(mine);
    });

    // Generate new mines
    for (let i = 0; i < 30; i++) {
      const mine = document.createElement("div");
      mine.className = "mine";
      const { x, y } = generateRandomCoordinates();
      mine.style.top = y + "px";
      mine.style.left = x + "px";
      box.appendChild(mine);
    }
  }

  // Function to create a food item element
  function createFoodItem() {
    foodItem = document.createElement("div");
    foodItem.className = "food-item";
    const { x, y } = generateRandomCoordinates();
    foodItem.style.top = y + "px";
    foodItem.style.left = x + "px";
    box.appendChild(foodItem);
  }

  // Function to stop the game and display game over message
  function stopGame() {
    messageDisplay.textContent = "💀 The Odyssey Ends Here, Try Again?"; // Display a message
    gameActive = false; // Stop the game and disable input
    document.removeEventListener("keydown", handleKeyDown); // Disable keydown event listener
  }

  // Function to check collision between two elements
  function isColliding(element1, element2) {
    const rect1 = element1.getBoundingClientRect();
    const rect2 = element2.getBoundingClientRect();

    return (
      rect1.left < rect2.right &&
      rect1.right > rect2.left &&
      rect1.top < rect2.bottom &&
      rect1.bottom > rect2.top
    );
  }

  // Handle keydown event
  function handleKeyDown(event) {
    if (lives <= 0 || !gameActive) {
      return; // Ignore key input when lives are <= 0 or game is not active
    }

    const key = event.key;
    const stepSize = 10;

    if (key === "ArrowUp" && ballY > 0 && ballY - stepSize >= 0 && ballX >= 0) {
      ballY = Math.max(0, ballY - stepSize);
      ball.style.top = ballY + "px";

    } else if (key === "ArrowDown" && ballY < boxHeight - ballHeight) {
      ballY = Math.min(boxHeight - ballHeight, ballY + stepSize);
      ball.style.top = ballY + "px";
    }

    if (key === "ArrowLeft" && ballX > 0 && ballX - stepSize >= 0 && ballY >= 0) {
      ballX = Math.max(0, ballX - stepSize);
      ball.style.left = ballX + "px";
    } else if (key === "ArrowRight" && ballX < boxWidth - ballWidth && ballY >= 0) {
      ballX = Math.min(boxWidth - ballWidth, ballX + stepSize);
      ball.style.left = ballX + "px";
    }
    event.preventDefault(); // Prevent default arrow key behavior

    // Get all mine elements
    const mines = document.getElementsByClassName("mine");

    // Check for collision with mines
    for (let i = 0; i < mines.length; i++) {
      if (isColliding(ball, mines[i])) {
        // Handle collision with mines (e.g., reduce life count)
        count++
        messageDisplay.textContent = `💣 Mine Collision! Watch Out! x${count}`; 
        lives--;

        // Remove the mine from the box
        box.removeChild(mines[i]);

        if (lives === 0) {
          livesCount.textContent = lives;
          // Game over logic here
          stopGame();
          break;
        }

        // Update lives count
        livesCount.textContent = lives;
        break;
      }
    }

    // Check for collision with food item
    if (isColliding(ball, foodItem)) {
      // Handle collision with food item (e.g., increase score)
      messageDisplay.textContent = `😇 Crunchy Goodness! x${score + 1}`;

      // Remove the food item from the box
      box.removeChild(foodItem);

      // Generate a new food item
      createFoodItem();

      // Increase the score
      score++;
      scoreCount.textContent = score;

      // Regenerate mines
      generateMines();
    }
  }

  // Reset the game
  function resetGame() {
    // Clear the message display
    messageDisplay.textContent = "";

    // Remove the existing food item and mines
    if (foodItem) {
      box.removeChild(foodItem);
    }
    const existingMines = document.querySelectorAll(".mine");
    existingMines.forEach((mine) => {
      box.removeChild(mine);
    });

    // Reinitialize the game
    initializeGame();
  }

  // Add event listener to the reset button
  resetButton.addEventListener("click", resetGame);

  // Initialize the game
  function initializeGame() {
    boxWidth = box.offsetWidth;
    boxHeight = box.offsetHeight;
    ballWidth = ball.offsetWidth;
    ballHeight = ball.offsetHeight;
    ballX = (boxWidth - ballWidth) / 2;
    ballY = (boxHeight - ballHeight) / 2;

    ball.style.left = ballX + "px";
    ball.style.top = ballY + "px";

    lives = 3;
    livesCount.textContent = lives;

    score = 0;
    scoreCount.textContent = score;
    
    count= 0;

    generateMines();
    createFoodItem();

    // Enable keydown event listener
    document.addEventListener("keydown", handleKeyDown);
    gameActive = true;
  }

  initializeGame();
});
</script>
</html>