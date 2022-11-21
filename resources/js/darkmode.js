{
    var toggle = document.getElementById("darkmode-toggle")
    var page_content = document.getElementById("page-content")
    var p = document.querySelectorAll("p")
    var form_select = document.querySelectorAll(".form-select")
    var h5 = document.querySelectorAll("h5")
    var card = document.querySelectorAll(".card")
    var table = document.querySelectorAll(".table")
    var td = document.querySelectorAll("td")
    var th = document.querySelectorAll("th")
    var h1 = document.querySelectorAll("h1")
    var h2 = document.querySelectorAll("h2")
    var h3 = document.querySelectorAll("h3")
    var h4 = document.querySelectorAll("h4")
    var accordion_button = document.querySelectorAll(".collapse")
    var dropdown = document.querySelectorAll(".dropdown-menu")

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

            table.forEach(element => {
                element.style.background = "#3a3a3c"
            });

            td.forEach(element => {
                element.style.color = "#fff"
            });

            th.forEach(element => {
                element.style.color = "#fff"
            });

            h1.forEach(element => {
                element.style.color = "#fff"
            });

            h2.forEach(element => {
                element.style.color = "#fff"
            });

            h3.forEach(element => {
                element.style.color = "#fff"
            });

            h4.forEach(element => {
                element.style.color = "#fff"
            });

            accordion_button.forEach(element => {
                element.style.background = "#3a3a3c"
                element.style.color = "#fff"
            });

            dropdown.forEach(element => {
                element.style.background = "#3a3a3c"
                element.style.color = "#fff"
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

            table.forEach(element => {
                element.style.background = "#fff"
            });

            td.forEach(element => {
                element.style.color = "#000"
            });

            th.forEach(element => {
                element.style.color = "#000"
            });

            h1.forEach(element => {
                element.style.color = "#000"
            });
            h2.forEach(element => {
                element.style.color = "#000"
            });
            h3.forEach(element => {
                element.style.color = "#000"
            });
            h4.forEach(element => {
                element.style.color = "#000"
            });
            accordion_button.forEach(element => {
                element.style.background = "#fff"
                element.style.color = "#000"
            });
            dropdown.forEach(element => {
                element.style.background = "#fff"
                element.style.color = "#000"
            });
        }
    })
}