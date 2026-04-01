document.getElementById("loginForm").addEventListener("submit", function(e) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Semua field harus diisi!");
        e.preventDefault();
    }
});