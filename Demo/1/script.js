
/* ************************************** */
/* script.js                              */
/* ************************************** */


var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");


/* Werkt niet, in index.html wel                              */


function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}











/* ************************************** */
/* script.js                              */
/* ************************************** */
