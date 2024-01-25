document.addEventListener('DOMContentLoaded', function() {
  // Retrieve username and password from local storage
  const savedUsername = localStorage.getItem('rememberedUsername');
  const savedPassword = localStorage.getItem('rememberedPassword');
  
  // If both username and password are found, redirect immediately
  if (savedUsername && savedPassword) {
    const redirectURL = validateUser(savedUsername, savedPassword);
    if (redirectURL) {
      alert('Belépés...');
      window.location.href = redirectURL;
    }
  }
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevents the default form submission
  
  // Object with multiple usernames and passwords, along with their corresponding directories
  const users = {
    mm: { password: '960LJ', directory: 'galaxyfilmek/index.html' },
    aa: { password: 'CL5D5', directory: 'galaxyfilmek/index.html' },
    // Add more users here as needed
  };

  // Get the entered username, password, and "Remember Me" checkbox status
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const rememberMe = document.getElementById('rememberMe').checked;
  
  // Check if the entered username and password are valid
  const redirectURL = validateUser(username, password);
  
  if (redirectURL) {
    alert('Sikeres belépés!');
    
    // Redirect the user to their respective directory upon successful login
    window.location.href = redirectURL;
    
    // Save username and password to local storage if "Remember Me" is checked
    if (rememberMe) {
      localStorage.setItem('rememberedUsername', username);
      localStorage.setItem('rememberedPassword', password);
    } else {
      localStorage.removeItem('rememberedUsername');
      localStorage.removeItem('rememberedPassword');
    }
  } else {
    alert('Kérjük próbálkozzon újra.');
  }
});

function validateUser(username, password) {
  // Object with multiple usernames and passwords, along with their corresponding directories
  const users = {
    mm: { password: '960LJ', directory: 'galaxyfilmek/index.html' },
    aa: { password: 'CL5D5', directory: 'galaxyfilmek/index.html' },
    // Add more users here as needed
  };

  // Check if the entered username exists and if the password matches
  if (users[username] && users[username].password === password) {
    return users[username].directory;
  }
  
  return null;
}
