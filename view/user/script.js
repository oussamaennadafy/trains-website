let btn1 = document.querySelector(".btn1");
let btn2 = document.querySelector(".btn2");
let btn3 = document.querySelector(".btn3");

btn1.addEventListener("click", function () {
  btn1.classList.add("clicked");
  btn1.classList.remove("clicked");
  btn1.classList.remove("clicked");
});
btn2.addEventListener("click", function () {
  btn1.classList.remove("clicked");
  btn1.classList.add("clicked");
  btn1.classList.remove("clicked");
});
btn3.addEventListener("click", function () {
  btn1.classList.remove("clicked");
  btn1.classList.remove("clicked");
  btn1.classList.add("clicked");
});
