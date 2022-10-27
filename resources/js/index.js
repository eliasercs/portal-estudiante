{
    const menu = document.getElementById("menu")
    const sidebar = document.getElementById("sidebar")
    const navbar = document.getElementById("navbar")
    const close_menu = document.getElementById("close-menu")
    //const content = document.getElementById("content")

    menu.addEventListener("click", () => {
        sidebar.style.display = "block"
        menu.style.display = "none"

        //content.style.marginLeft = "20%"
        //content.style.width = "80%"
    })

    close_menu.addEventListener("click", () => {
        sidebar.style.display = "none"
        menu.style.display = "block"

        //content.style.marginLeft = "0%"
        //content.style.width = "100%"
    })
}