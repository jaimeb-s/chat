window.setInterval(function() {
    function confirmacion(e) {
        if (confirm("¿Eliminar contacto?")) {
            return true;
        } else {
            e.preventDefault();
        }
    }

    let linkDelete = document.querySelectorAll(".elim_cont");

    for (var i = 0; i < linkDelete.length; i++) {
        linkDelete[i].addEventListener('click', confirmacion); 
    }

}, 1000);
    

