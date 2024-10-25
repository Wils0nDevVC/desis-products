<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Formulario de Producto</h1> <span id="titlejs"></span>
        <form>
            <div class="form-row">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" >
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega">
                    <option value="">Seleccione una bodega</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal">
                        <option value="">Seleccione una sucursal</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda">
                    <option value="">Seleccione una moneda</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" >
                </div>
            </div>

            <div class="form-group">
                <label>Material del Producto</label>
                <div class="checkbox-group">
                </div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"></textarea>
            </div>
            <button type="submit" id="guardarProducto" class="submit-btn">Guardar Producto</button>
        </form>
    </div>
    <script src="<?= URL::to("assets/plugins/jquery-3.7.1.min.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/listar-bodegas.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/listar-sucursales.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/listar-monedas.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/listar-materiales.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/guardar-producto.js") ?>" type="text/javascript"></script>
</body>
</html>
