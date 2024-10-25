<?php
require_once './services/ProductoService.php'; 
require_once './model/Producto.php'; 
require_once './core/Respuesta.php';

class ProductoController
{
    protected $productoService;

    public function __construct()
    {
        $crudProducto = new Crud('productos');
        $crudProductoMaterial = new Crud('productos_materiales');
        $this->productoService = new ProductoService($crudProducto, $crudProductoMaterial);
    }

    public function index()
    {
        require_once './view/producto.php';
    }

    public function crearProducto()
    {

        try {
            $codigo = $_POST['codigo'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $bodegaId = (int)$_POST['bodega'] ?? null;
            $sucursalId = (int)$_POST['sucursal'] ?? null;
            $monedaId = (int)$_POST['moneda'] ?? null;
            $precio = (float)$_POST['precio'] ?? null;
            $descripcion = $_POST['descripcion'] ?? null;
            $materiales = $_POST['materiales'] ?? [];
            $producto = new Producto(null, $codigo, $nombre, $bodegaId, $sucursalId, $monedaId, $precio, $descripcion);

            list('status' => $status, 'mensaje' => $mensaje) = $this->productoService->saveProductWithMaterials($producto, $materiales);
            
            if ($status != 500) {
                $respuesta = new Respuesta(200, "Se guardo correctamente");
            } else {
                $respuesta = new Respuesta($status, "Ocurrio un error", $mensaje);
            }

            echo $respuesta->json();
        } catch (Exception $ex) {
            $respuesta = new Respuesta(500, "Ocurrio un error");
            echo $respuesta->json();
        }
    }
}
