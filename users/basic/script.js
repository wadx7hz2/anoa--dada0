// Get the search input, movie elements, and the "noResultsMessage" element
const searchInput = document.getElementById("searchInput");
const movies = document.querySelectorAll(".movie");
const noResultsMessage = document.getElementById("noResultsMessage");


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
