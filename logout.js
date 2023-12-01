// Assuming Netlify Identity is initialized on the other page as well
if (netlifyIdentity.currentUser() !== null) {
    // User is logged in, perform your actions
    console.log('User is logged in');
  } else {
    // User is not logged in, redirect to 'x' page
    window.location.href = 'https://dash-galaxy.netlify.app/'; // Replace '/x-page' with your desired page
  }