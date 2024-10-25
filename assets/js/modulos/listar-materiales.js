function obtenerMateriales() {
    let $checkboxGroup = $('.checkbox-group');
    $.ajax({
        url: 'http://localhost:8080/desis/materiales',  
        type: 'POST',
        dataType: 'json', 
        success: function(response) {

            if (Array.isArray(response.datos) && response.datos.length > 0) {
               
                response.datos.forEach(function(material) {
                    console.log(material)
                    let checkbox = $('<label>').append(
                        $('<input>', {
                            type: 'checkbox',
                            name: 'material',
                            value: material.id
                        }),
                        material.nombre
                    );

                    $checkboxGroup.append(checkbox);
                });
            } else {
                $checkboxGroup.append('<p>No hay materiales disponibles.</p>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error al obtener materiales:", textStatus, errorThrown);
            $checkboxGroup.append('<p>No hay materiales disponibles.</p>');
        }
    });
}

$(document).ready(function() {
    obtenerMateriales();
});
