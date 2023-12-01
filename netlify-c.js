
// Change language
netlifyIdentity.setLocale('hu');


// Assuming you have Netlify Identity initialized
netlifyIdentity.on('login', () => {
    // Redirect after login
    window.location.href = '/galaxylibrary/';
  });