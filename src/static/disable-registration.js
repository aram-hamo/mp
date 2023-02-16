document.getElementById("firstName").disabled = true;
document.getElementById("lastName").disabled = true;
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("email").disabled = true;
document.getElementById("submit").disabled = true;


const warning = document.createElement("div");
warning.className = "alert alert-warning"
warning.textContent = "Registeration is Disabled"
alertMessage = document.getElementById("alert");
alertMessage.appendChild(warning);
