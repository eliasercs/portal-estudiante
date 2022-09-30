let toggle_password = document.getElementById("toggle_password")
let toggle_current_password = document.getElementById("toggle_current_password")
let toggle_new_password = document.getElementById("toggle_new_password")
let toggle_repeat_new_password = document.getElementById("toggle_repeat_new_password")
let password = document.getElementById("password")
let current_password = document.getElementById("current_password")
let new_password = document.getElementById("new_password")
let repeat_new_password = document.getElementById("repeat_new_password")

const toggle_eye = (input, toggle) => {
    let type_password = {
        type: input.getAttribute("type") === "password" ? "text" : "password",
        icon: input.getAttribute("type") === "password" ? "bi-eye-slash-fill" : "bi-eye-fill"
    }
    input.setAttribute("type", type_password["type"])
    toggle.children[0].setAttribute("class", `bi ${type_password["icon"]}`)
}

toggle_password.addEventListener("click", () => toggle_eye(password, toggle_password))

toggle_current_password.addEventListener("click", () => toggle_eye(current_password, toggle_current_password))

toggle_new_password.addEventListener("click", () => toggle_eye(new_password, toggle_new_password))

toggle_repeat_new_password.addEventListener("click", () => toggle_eye(repeat_new_password, toggle_repeat_new_password))