document.getElementById('signUp').addEventListener('click', function() {
    document.getElementById('container').classList.add('right-panel-active');
});

document.getElementById('signIn').addEventListener('click', function() {
    document.getElementById('container').classList.remove('right-panel-active');
});

document.getElementById('signupForm').addEventListener('submit', function(event) {
    var username = document.getElementById('signupUsername').value;
    var email = document.getElementById('signupEmail').value;
    var password = document.getElementById('signupPassword').value;

    if (username === '' || email === '' || password === '') {
        alert('All fields are required!');
        event.preventDefault();
    } else if (!validateEmail(email)) {
        alert('Invalid email format!');
        event.preventDefault();
    }
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
