const form = document.getElementById('form');
const emailInput = document.getElementById('email');
const contentInput = document.getElementById('content');
const postBtn = document.getElementById('postBtn');
const resetBtn = document.getElementById('resetBtn');
const loginButton = document.getElementById('login-button');
const loginFormContainer = document.getElementById('login-form-container');
var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname){
    for(tablink of tablinks){
        tablink.classList.remove("active-link");
    }
    for(tabcontent of tabcontents){
        tabcontent.classList.remove("active-tab");
    }
    event.currentTarget.classList.add("active-link");
    document.getElementById(tabname).classList.add("active-tab");
}

postBtn.addEventListener('click', (e) => {
    if (form.email.value.trim() === '' && form.content.value.trim() === '') {
        e.preventDefault();
        emailInput.classList.add('error');
        contentInput.classList.add('error');
        alert('Please fill in all required fields.');
    } else if (titleInput.value.trim() === '') {
        e.preventDefault();
        emailInput.classList.add('error');
        alert('Please fill in the Title field.');
    } else if (contentInput.value.trim() === '') {
        e.preventDefault();
        contentInput.classList.add('error');
        alert('Please fill in the Content field.');
    } else {
        form.email.classList.remove('error');
        form.content.classList.remove('error');
    }
});