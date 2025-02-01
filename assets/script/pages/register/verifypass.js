function verificaSenha() {
    if (document.getElementById("confSenha").value != document.getElementById("senha").value) {
        document.getElementById("textConfSenha").innerHTML = "Senhas não conferem!"
        document.getElementById("confSenha").classList.remove("is-valid");
        document.getElementById("senha").classList.remove("is-valid");
        document.getElementById("confSenha").classList.add("is-invalid");
    } else if(document.getElementById("confSenha").value == "") {
        document.getElementById("textConfSenha").innerHTML = ""
        document.getElementById("confSenha").classList.remove("is-valid");
        document.getElementById("senha").classList.remove("is-valid");
        document.getElementById("confSenha").classList.remove("is-invalid");
    } else {
        document.getElementById("textConfSenha").innerHTML = ""
        document.getElementById("confSenha").classList.remove("is-invalid");
        document.getElementById("confSenha").classList.add("is-valid");
        document.getElementById("senha").classList.add("is-valid");
    }
}

function confirmaCampos() {

}