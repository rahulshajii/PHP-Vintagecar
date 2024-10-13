document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Basic validation (you can add more advanced validation here)
    if (email === "" || password === "") {
        alert("Please fill in both fields.");
    } else {
        alert("Login successful!");
        // Perform login action (e.g., send data to the server)
    }
});
