function obtenerSucursales(bodegaId) {

  
    let $select = $('#sucursal'); 
    $select.empty(); 

    $.ajax({
        url: 'http://localhost:8080/desis/sucursales',  
        type: 'POST',
        dataType: 'json', 
        data: { id:bodegaId },
        success: function(response) {

            console.log(response)

            if ( Array.isArray(response.datos) && response.datos.length > 0) {
               

                response.datos.forEach(function(sucursal) {
                    $select.append($('<option>', {
                        value: sucursal.id,
                        text: sucursal.nombre 
                    }));
                });
            } else {
                $select.append($('<option>', {
                    value: '', 
                    text: 'Seleccione una sucursal' 
                }));
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

            console.error(jqXHR)
        }
    });
}

$(document).ready(function() {
    $('#bodega').on('change', function() {
        var bodegaId = $(this).val(); 
        if (bodegaId) {
            obtenerSucursales(bodegaId); 
        } else {
            $('#sucursal').empty().append('<option value="">Seleccione una sucursal</option>'); 
        }
    });
});
