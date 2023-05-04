const loginButton = document.getElementById('login-button');
const loginFormContainer = document.getElementById('login-form-container');

loginButton.addEventListener('click', function() {
  loginFormContainer.classList.toggle('is-open');
});

document.addEventListener('click', function(event) {
  if (!loginFormContainer.contains(event.target) && !loginButton.contains(event.target)) {
    loginFormContainer.classList.remove('is-open');
  }
});

/*document.addEventListener('click', function(event) {
  if (!loginFormContainer.contains(event.target)) {
    loginFormContainer.style.display = 'none';
  }
});
*/