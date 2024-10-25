function obtenerMonedas() {
    let $select = $('#moneda'); 

    $.ajax({
        url: 'http://localhost:8080/desis/monedas',  
        type: 'POST',
        dataType: 'json', 
        success: function(response) {
            if (Array.isArray(response.datos) && response.datos.length > 0) {
               
                response.datos.forEach(function(moneda) {
                    $select.append($('<option>', {
                        value: moneda.id,
                        text: moneda.nombre 
                    }));
                });
            } else {
                $select.append($('<option>', {
                    value: '', 
                    text: 'No hay monedas disponibles' 
                }));
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

            $select.append($('<option>', {
                value: '', 
                text: 'No hay monedas disponibles' 
            }));
        }
    });
}

$(document).ready(function() {
    obtenerMonedas();
});
