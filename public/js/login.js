/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
var toggle_password = document.getElementById("toggle_password");
var toggle_current_password = document.getElementById("toggle_current_password");
var toggle_new_password = document.getElementById("toggle_new_password");
var toggle_repeat_new_password = document.getElementById("toggle_repeat_new_password");
var password = document.getElementById("password");
var current_password = document.getElementById("current_password");
var new_password = document.getElementById("new_password");
var repeat_new_password = document.getElementById("repeat_new_password");
var toggle_eye = function toggle_eye(input, toggle) {
  var type_password = {
    type: input.getAttribute("type") === "password" ? "text" : "password",
    icon: input.getAttribute("type") === "password" ? "bi-eye-slash-fill" : "bi-eye-fill"
  };
  input.setAttribute("type", type_password["type"]);
  toggle.children[0].setAttribute("class", "bi ".concat(type_password["icon"]));
};
toggle_password.addEventListener("click", function () {
  return toggle_eye(password, toggle_password);
});
toggle_current_password.addEventListener("click", function () {
  return toggle_eye(current_password, toggle_current_password);
});
toggle_new_password.addEventListener("click", function () {
  return toggle_eye(new_password, toggle_new_password);
});
toggle_repeat_new_password.addEventListener("click", function () {
  return toggle_eye(repeat_new_password, toggle_repeat_new_password);
});
/******/ })()
;