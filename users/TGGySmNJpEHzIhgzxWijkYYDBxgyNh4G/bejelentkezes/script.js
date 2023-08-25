document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission and page refresh

  // Get the email and password inputs
  var emailInput = document.getElementById("email-input");
  var passwordInput = document.getElementById("password-input");

  // Validate the credentials using an external script
  validateCredentials(emailInput.value, passwordInput.value, function(valid) {
    if (valid) {
      // Show the page content in an iframe
      showPageContent();
    }
  });
});

function showPageContent() {
  // Hide the login form
  var loginContainer = document.querySelector(".login-container");
  loginContainer.style.display = "none";

  // Create an iframe element
  var iframe = document.createElement("iframe");
  iframe.src = "https://havok-corp.netlify.app/users/shared-central-site/basic/index.html"; // Replace with the URL of your protected page
  iframe.className = "page-iframe";
  document.body.innerHTML = ""; // Clear the existing content
  document.body.appendChild(iframe);
}

function validateCredentials(email, password, callback) {
  // Perform the necessary logic to check the credentials
  // For example:
  if (email === "valid@example.com" && password === "password") {
    isLoggedIn = true; // Set the login status to true
    callback(true); // Credentials are valid
  } else {
    isLoggedIn = false; // Set the login status to true
    callback(false); // Credentials are invalid
  }
}