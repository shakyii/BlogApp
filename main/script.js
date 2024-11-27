let likeBtn = document.querySelector(".btn-like");

let count = document.querySelector("#count");
let clicked = false;

likeBtn.addEventListener("click", function () {
  if (!clicked) {
    clicked = true;
    likeBtn.style.background = "green";
    count.textContent++;
  } else {
    clicked = false;
    count.textContent--;
    likeBtn.style.background = "#4dabf7";
  }
});
