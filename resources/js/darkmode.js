{
    var toggle = document.getElementById("darkmode-toggle")
    var page_content = document.getElementById("page-content")
    var p = document.querySelectorAll("p")
    var form_select = document.querySelectorAll(".form-select")
    var h5 = document.querySelectorAll("h5")
    var card = document.querySelectorAll(".card")

    toggle.addEventListener("input", () => {
        console.log(page_content.childNodes)
        if (toggle.checked) {
            page_content.style.background = "#0a0a0a"
            p.forEach(element => {
                element.style.color = "#fff"
            });
            form_select.forEach(element => {
                element.style.background = "#0a0a0a"
                element.style.color = "#fff"
            });
            h5.forEach(element => {
                element.style.color = "#fff"
            });
            card.forEach(element => {
                element.style.background = "#3a3a3c"
            });
        } else {
            page_content.style.background = "#ffffff"
            p.forEach(element => {
                element.style.color = "#000"
            });
            form_select.forEach(element => {
                element.style.background = "#fff"
                element.style.color = "#000"
            });
            h5.forEach(element => {
                element.style.color = "#000"
            });
            card.forEach(element => {
                element.style.background = "#fff"
            });
        }
    })
}