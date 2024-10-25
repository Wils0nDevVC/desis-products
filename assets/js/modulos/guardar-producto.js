$(document).ready(function () {
  document
    .querySelector(".submit-btn")
    .addEventListener("click", function (event) {
      event.preventDefault();
      const form = document.querySelector("form");
      const formData = new FormData(form);
      let isValid = true;

      formData.forEach((value, key) => {
        if (key === "codigo") {
          if (value.trim() === "") {
            alert("El código del producto no puede estar en blanco.");
            isValid = false;
          } else if (!/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/.test(value)) {
            alert("El código del producto debe contener letras y números.");
            isValid = false;
          } else if (value.length < 5 || value.length > 15) {
            alert("El código del producto debe tener entre 5 y 15 caracteres.");
            isValid = false;
          }
        }

        if (key === "nombre") {
          if (value.trim() === "") {
            alert("El nombre del producto no puede estar en blanco.");
            isValid = false;
          } else if (value.length < 2 || value.length > 50) {
            alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            isValid = false;
          }
        }

        if (key === "precio") {
          if (value.trim() === "") {
            alert("El precio del producto no puede estar en blanco.");
            isValid = false;
          } else if (!/^\d+(\.\d{1,2})?$/.test(value)) {
            alert(
              "El precio del producto debe ser un número positivo con hasta dos decimales."
            );
            isValid = false;
          }
        }

        if (key === "bodega") {
            if (value.trim() === "") {
                alert("Debe seleccionar una bodega.");
                isValid = false;
            }
          }

          
        if (key === "sucursal") {
            if (value.trim() === "") {
                alert("Debe seleccionar una sucursal.");
                isValid = false;
            }
          }

          if (key === "moneda") {
            if (value.trim() === "") {
                alert("Debe seleccionar una moneda.");
                isValid = false;
            }
          }

          if (key === "descripcion") {
            if (value.trim() === "") {
                alert("La descripción del producto no puede estar en blanco.");
                isValid = false;
            }else if (value.length < 10  || value.length > 1000) {
                alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
                isValid = false;
            }
          }
        
      });

      const selectedMaterials = form.querySelectorAll('input[name="material"]:checked');
        console.log(selectedMaterials)
        if (selectedMaterials.length < 2) {
            alert("Debe seleccionar al menos dos materiales para el producto.");
            isValid = false;
        }else{
            $(selectedMaterials).each(function () {
                formData.append('materiales[]', $(this).val()); 
            });
        }

      if (isValid) {
        enviarFormulario(formData,form)
      }
    });


});


function enviarFormulario(formData,form) {
    $.ajax({
        url: 'http://localhost:8080/desis/producto/crear', 
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (response) {

            if(response.codigo === 500){
              alert(response.datos);
            }else{
              alert(response.mensaje);
              form.reset()

            }
           
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error al guardar el producto: " + textStatus);
        }
    });
}
