document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevents the default form submission
  
  // Object with multiple usernames and passwords, along with their corresponding directories
  const users = {
    mm: { password: '960LJ', directory: 'galaxylibrary/' },
    aa: { password: 'CL5D5', directory: 'galaxylibrary/' },
    // Add more users here as needed
  };
  
  // Get the entered username and password
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  
  // Check if the entered username exists and if the password matches
  if (users[username] && users[username].password === password) {
    const redirectURL = users[username].directory;
    // Redirect the user to their respective directory upon successful login
    window.location.href = redirectURL;
  } else {
    alert('Kérjük próbálkozzon újra.');
  }
});
