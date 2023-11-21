//validator doc
//https://github.com/validatorjs/validator.js
function onSubmit() {
    let usernameInput = document.querySelector('#username');
    let passwordInput = document.querySelector('#password');

    let usernameValue = usernameInput.value;
    let passwordValue = passwordInput.value;



    alert(validator.isAlpha(usernameValue));
    alert(validator.isLength(passwordValue , {min: 8}))

}