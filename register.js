const passwordInput = document.getElementById("password-new");
const strengthBar = document.getElementById("strengthBarFill");
const strengthText = document.getElementById("strengthText");

// PASSWORD STRENGTH
passwordInput.addEventListener("input", function () {
    let val = passwordInput.value;
    let strength = 0;

    if (val.length >= 6) strength++;
    if (val.match(/[A-Z]/)) strength++;
    if (val.match(/[0-9]/)) strength++;

    if (strength === 1) {
        strengthBar.style.width = "33%";
        strengthBar.style.background = "red";
        strengthText.innerText = "Lemah";
    } else if (strength === 2) {
        strengthBar.style.width = "66%";
        strengthBar.style.background = "orange";
        strengthText.innerText = "Sedang";
    } else if (strength === 3) {
        strengthBar.style.width = "100%";
        strengthBar.style.background = "green";
        strengthText.innerText = "Kuat";
    }
});

// VALIDASI REGISTER
document.getElementById("registerForm").addEventListener("submit", function(e) {
    const password = document.getElementById("password-new").value;
    const confirm = document.getElementById("password-confirm").value;

    if (password !== confirm) {
        alert("Password tidak cocok!");
        e.preventDefault();
    }
});

// GENDER
document.getElementById("btnMale").onclick = () => {
    document.getElementById("gender").value = "Laki-laki";
};

document.getElementById("btnFemale").onclick = () => {
    document.getElementById("gender").value = "Perempuan";
};