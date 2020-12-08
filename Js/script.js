
function buttonOpen() {
  document.getElementById("myModal").style.display = "block";
}
  function Close() {
  document.getElementById("myModal").style.display = "none";
}

window.onclick = function(event) {  
  if (event.target == document.getElementById("myModal")) {
    document.getElementById("myModal").style.display = "none";
  }
} 
function buttonPerfil() {
  document.getElementById("PerfilModal").style.display = "block";
}
function ClosePerfil() {
  document.getElementById("PerfilModal").style.display = "none";
}
function buttonSobre() {
  document.getElementById("ModalSobre").style.display = "block";
}
function CloseSobre() {
  document.getElementById("ModalSobre").style.display = "none";
}
function buttonPrivacidade() {
  document.getElementById("ModalPrivacidade").style.display = "block";
}
function ClosePrivacidade() {
  document.getElementById("ModalPrivacidade").style.display = "none";
}
