// add this at the top of the body in html
// then connect this script to the html
// <div id="top" style="height: 100px; position: fixed; top: 0; background-color: aqua; width: 100vw;"></div>
// <div id="bottom" style="height: 100px; position: fixed; bottom: 0; background-color: red; width: 100vw;"></div> 


// make a function to enable scroll
function enableScroll() {
    document.body.style.overflow = 'auto';
    console.log('scroll enabled');
}

// make a function to disable scroll
function disableScroll() {
    document.body.style.overflow = 'hidden';
    console.log('scroll disabled');
}

// make a function to only scroll upwards
function scrollUp() {
    window.scrollBy(0,-20);
}

// Function to start scrolling up repeatedly
function startScrollingUp() {
    scrollInterval = setInterval(scrollUp, 50); // Adjust the interval as needed
}


// make a function to only scroll downwards
function scrollDown() {
    window.scrollBy(0,20);
}

// Function to start scrolling down repeatedly
function startScrollingDown() {
    scrollInterval = setInterval(scrollDown, 50); // Adjust the interval as needed
}

// Function to stop scrolling
function stopScrolling() {
    clearInterval(scrollInterval);
}




// enable scroll
enableScroll();

// disable scroll
disableScroll();

// if your mouse is in div named 'top' console log it
document.getElementById('top').addEventListener('mouseover', function() {
    console.log('top');
});

// if your mouse is in div named 'bottom' console log it
document.getElementById('bottom').addEventListener('mouseover', function() {
    console.log('bottom');
});

// if your mouse is in div named 'top' you can scroll up
document.getElementById('top').addEventListener('mouseover', function() {
    startScrollingUp();
});
// if your mouse is out of div named 'top' you cant scroll
document.getElementById('top').addEventListener('mouseout', function() {
    stopScrolling();
});

// if your mouse is in div named 'bottom' you can scroll down
document.getElementById('bottom').addEventListener('mouseover', function() {
    startScrollingDown();
});

// if your mouse is out of div named 'bottom' you can't scroll
document.getElementById('bottom').addEventListener('mouseout', function() {
    stopScrolling();
});
