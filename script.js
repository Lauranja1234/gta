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
