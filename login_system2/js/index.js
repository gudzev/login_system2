let seePassword = document.getElementById("see_password");
let password = document.getElementById("password");
let isEnabled = false;

function showPassword()
{
    let passwordText = password.value;
    console.log(passwordText);

    if(isEnabled == true)
    {
        seePassword.classList.remove("fa-eye");
        seePassword.classList.add("fa-eye-slash");
        isEnabled = false;
        password.type = "password";
    }
    else
    {
        seePassword.classList.remove("fa-eye-slash");
        seePassword.classList.add("fa-eye");
        isEnabled = true;
        password.value = passwordText;
        password.type = "text";
    }
}