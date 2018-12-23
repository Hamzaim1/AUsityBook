// If user clicks anywhere outside of the modal, Modal will close

var modal1 = document.getElementById('modal-wrapper');
var modal2 = document.getElementById('modal-msg');
var modal3 = document.getElementById('modal-chat');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
	else if (event.target == modal2) {
        modal2.style.display = "none";
    }
    else if (event.target == modal3) {
        modal3.style.display = "none";
    }
}



function myFunction() {
  var x = document.getElementById("chat-body");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} 
