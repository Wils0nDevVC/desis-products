<?php
require_once './services/MaterialesService.php';
require_once './model/Crud.php';
require_once './model/Material.php';
require_once './core/Respuesta.php';

class MaterialController
{
    protected $MaterialesService;

    public function __construct()
    {
        $this->MaterialesService = new MaterialesService(new Crud('materiales'));
    }

    public function index()
    {
        require_once './view/producto.php';
    }

    public function findAll()
    {
        
        $Materialess = $this->MaterialesService->findAll();
        $respuesta = new Respuesta(200, "Datos de Materialess obtenidos correctamente", $Materialess);
        echo $respuesta->json();
    }
}
