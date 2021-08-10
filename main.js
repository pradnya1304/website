const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");

});


function signUp(){
    var user_name = getElementById('name')
    var user_email = getElementById('email')
    var user_password = getElementById('password')
    if(user_name.value =='' || user_password.value == '' || user_email.value == ''){
        alert('Please fill in the required details')
        return false;
    }
    else{
        alert('Details successfully logged in')
        true;
    }
}