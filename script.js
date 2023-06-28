// Get the search input, movie elements, and the "noResultsMessage" element
const searchInput = document.getElementById("searchInput");
const movies = document.querySelectorAll(".movie");
const noResultsMessage = document.getElementById("noResultsMessage");

// Function to check if the user is logged in
function checkAuthentication() {
  // Check if user is logged in using Netlify Identity
  if (!netlifyIdentity.currentUser()) {
    // User is not logged in, redirect to login page
    window.location.href = "https://havokcorp.netlify.app/site-login/"; // Replace with the actual URL of your login page
  }
}

// Execute the checkAuthentication function when the page loads
document.addEventListener("DOMContentLoaded", function() {
  checkAuthentication();
});

// Function to filter movies
function filterMovies() {
  const searchTerm = searchInput.value.toLowerCase();
  let matchFound = false;

  movies.forEach((movie) => {
    const movieTitle = movie.querySelector("h3").textContent.toLowerCase();
    const isMatch = movieTitle.includes(searchTerm);

    // Toggle a CSS class to show/hide movies based on the search term
    movie.classList.toggle("hidden", !isMatch);

    // Set matchFound to true if at least one movie matches the search term
    if (isMatch) {
      matchFound = true;
    }
  });

  // Show/hide the "noResultsMessage" element based on matchFound
  noResultsMessage.style.display = matchFound ? "none" : "block";
}

// Event listener for search input
searchInput.addEventListener("input", filterMovies);
