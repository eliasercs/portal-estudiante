{
    const menu = document.getElementById("menu")
    const sidebar = document.getElementById("sidebar")
    const navbar = document.getElementById("navbar")
    const close_menu = document.getElementById("close-menu")
    //const content = document.getElementById("content")
    let cont_stikers=document.getElementById("container_stikers")

    menu.addEventListener("click", () => {
        sidebar.style.display = "block"
        menu.style.display = "none"
        cont_stikers.style.marginLeft ="22%"
        //content.style.marginLeft = "20%"
        //content.style.width = "80%"
    })

    close_menu.addEventListener("click", () => {
        sidebar.style.display = "none"
        menu.style.display = "block"
        cont_stikers.style.marginLeft ="0%"
        //content.style.marginLeft = "0%"
        //content.style.width = "100%"
    })


}