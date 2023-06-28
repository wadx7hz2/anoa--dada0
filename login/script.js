import { createClient } from './node_modules/@supabase/supabase-js';

const supabase = createClient('https://faucjqnpqarxayugoksk.supabase.co', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZhdWNqcW5wcWFyeGF5dWdva3NrIiwicm9sZSI6ImFub24iLCJpYXQiOjE2ODc2OTE2MjcsImV4cCI6MjAwMzI2NzYyN30.tUCsoCn-gs91tN_yD7cbcC7J2OXbXlvqOx0cqpqqv70');


function validateLogin(event) {
  event.preventDefault(); // Prevent form submission

  // Get the entered email and password
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  // Sign in using Supabase Authentication
  supabase.auth.signIn({ email, password })
    .then(response => {
      if (response.error) {
        // Display an error message
        document.getElementById("message").textContent = response.error.message;
      } else {
        // Redirect to a specific page
        window.location.href = "main.html";
      }
    })
    .catch(error => {
      // Display an error message
      document.getElementById("message").textContent = "An error occurred during login.";
      console.error(error);
    });
}
