function obtenerBodegas() {
    let $select = $('#bodega'); 

    $.ajax({
        url: 'http://localhost:8080/desis/bodegas',  
        type: 'POST',
        dataType: 'json', 
        success: function(response) {

            if (response.datos && Array.isArray(response.datos)) {
               
                response.datos.forEach(function(bodega) {
                    $select.append($('<option>', {
                        value: bodega.id,
                        text: bodega.nombre 
                    }));
                });
            } else {
                $select.append($('<option>', {
                    value: '', 
                    text: 'No hay bodegas disponibles' 
                }));
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

            $select.append($('<option>', {
                value: '', 
                text: 'No hay bodegas disponibles' 
            }));
        }
    });
}

$(document).ready(function() {
    obtenerBodegas();
});
