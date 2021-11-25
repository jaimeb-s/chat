window.setInterval(function() {
    var barra = document.getElementById("bar_msj");

    if (barra != null) {
        barra.scrollTop = barra.scrollHeight;
    }
}, 1000);