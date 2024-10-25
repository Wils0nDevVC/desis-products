<?php
require_once './model/Producto.php';
require_once './model/Material.php';
require_once './model/ProductoMaterial.php';

class ProductoService
{
    protected $crudProducto;
    protected $crudProductoMaterial;
    protected $conexion;

    public function __construct(Crud $crudProducto, Crud $crudProductoMaterial)
    {
        $this->crudProducto = $crudProducto;
        $this->crudProductoMaterial = $crudProductoMaterial;
        $this->conexion = (new Conexion())->conectar();
    }

    public function saveProductWithMaterials(Producto $producto, array $materiales)
    {   
        $respuesta = ["status"=>0, "mensaje"=>""];

        try {

            $existCodigo = $this->crudProducto->findAll(["codigo"=>$producto->getCodigo()]);

            if (count($existCodigo) > 0) {
                $respuesta["status"] = 500;
                $respuesta["mensaje"] = "Ya existe un producto con el código: " . $producto->getCodigo();
                return $respuesta;
            }

            
            $this->conexion->beginTransaction();
            $productoId = $this->crudProducto->save([
                'codigo' => $producto->getCodigo(),
                'nombre' => $producto->getNombre(),
                'bodega_id' => $producto->getBodegaId(),
                'sucursal_id' => $producto->getSucursalId(),
                'moneda_id' => $producto->getMonedaId(),
                'precio' => $producto->getPrecio(),
                'descripcion' => $producto->getDescripcion(),
            ]);



            if ($productoId === null) {
                throw new Exception("No se pudo guardar el producto.");

                $respuesta["status"] = 500;
                $respuesta["mensaje"] = "No se pudo guardar el producto.";
                return $respuesta;
            }

    
            foreach ($materiales as $materialId) {
                $productoMaterialCrud = new Crud("productos_materiales"); 
                 $productoMaterialCrud->saveTransaction([
                    'producto_id' => $productoId,
                    'material_id' => $materialId,
                ]);

            }


            $this->conexion->commit();
            return $productoId;

        } catch (Exception $e) {
            $this->conexion->rollBack();
            $respuesta["status"] = 500;
            $respuesta["mensaje"] = "Error al guardar el producto y sus materiales: " . $e->getMessage();
            return $respuesta;

        }
    }
}
