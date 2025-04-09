document.getElementById("openModal").addEventListener("click", function() {
    document.getElementById("loginModal").style.display = "block";
});
document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("loginModal").style.display = "none";
});
window.addEventListener("click", function(event) {
    if (event.target === document.getElementById("loginModal")) {
        document.getElementById("loginModal").style.display = "none";
    }
});
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if (username === "admin" && password === "admin123") {
        window.location.href = "admin.php";
    } else {
        alert("Ongeldige gebruikersnaam of wachtwoord");
    }
}); 