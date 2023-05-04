const form = document.getElementById('addBlogForm');
const titleInput = document.getElementById('titleInput');
const contentInput = document.getElementById('contentInput');
const postBtn = document.getElementById('postBtn');
const resetBtn = document.getElementById('resetBtn');
const loginButton = document.getElementById('login-button');
const loginFormContainer = document.getElementById('login-form-container');

resetBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (confirm('Are you sure you want to clear the form?')) {
        form.reset();
    }
});

postBtn.addEventListener('click', (e) => {
    if (form.title.value.trim() === '' && form.content.value.trim() === '') {
        e.preventDefault();
        titleInput.classList.add('error');
        contentInput.classList.add('error');
        alert('Please fill in all required fields.');
    } else if (titleInput.value.trim() === '') {
        e.preventDefault();
        titleInput.classList.add('error');
        alert('Please fill in the Title field.');
    } else if (contentInput.value.trim() === '') {
        e.preventDefault();
        contentInput.classList.add('error');
        alert('Please fill in the Content field.');
    } else {
        form.title.classList.remove('error');
        form.content.classList.remove('error');
    }
});