{
    let menu = document.getElementById("menu")
    let sidebar = document.getElementById("sidebar")
    let navbar = document.getElementById("navbar")
    let content = document.getElementById("content")

    menu.addEventListener("click", () => {
        let classList = menu.classList

        if (classList.contains("bi-list")) {
            sidebar.style.display = "block"
            navbar.style.marginLeft = "20%"
            navbar.style.width = "80%"

            menu.classList.remove("bi-list")
            menu.classList.add("bi-x-lg")

            content.style.marginLeft = "20%"
            content.style.width = "80%"

        } else if (classList.contains("bi-x-lg")) {
            sidebar.style.display = "none"
            navbar.style.marginLeft = "0%"
            navbar.style.width = "100%"

            menu.classList.remove("bi-x-lg")
            menu.classList.add("bi-list")

            content.style.marginLeft = "0%"
            content.style.width = "100%"
        }
    })
}