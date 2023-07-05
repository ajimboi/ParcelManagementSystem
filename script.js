// Function to handle the screen resize event
function handleResize() {
    const container = document.querySelector('.container'); // Get the container element

    if (window.innerWidth < 768) {
        // Adjust styles for small screens
        container.style.fontSize = '16px';
    } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
        // Adjust styles for medium screens
        container.style.fontSize = '18px';
    } else {
        // Adjust styles for large screens
        container.style.fontSize = '20px';
    }
}

// Listen for the resize event and call the handleResize function
window.addEventListener('resize', handleResize);

// Call the handleResize function initially to adjust the styles on page load
handleResize();
