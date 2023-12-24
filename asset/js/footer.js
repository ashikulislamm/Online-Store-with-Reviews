var subDiv = document.getElementById("subdiv");
var subClose = document.getElementById("sub_close");
var subBtn = document.getElementById("footer__btn");

subBtn.addEventListener("click" , function(){
  subDiv.classList.add("show_sub");
});

subClose.addEventListener("click" , function(){
  subDiv.classList.remove("show_sub");
});