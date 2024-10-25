<?php
require_once './services/BodegaService.php';
require_once './model/Crud.php';
require_once './model/Bodega.php';
require_once './core/Respuesta.php';

class BodegaController
{
    protected $bodegaService;

    public function __construct()
    {
        $this->bodegaService = new BodegaService(new Crud('bodegas'));
    }

    public function index()
    {
        require_once './view/producto.php';
    }

    public function findAll()
    {
        
        $bodegas = $this->bodegaService->findAll();
        $respuesta = new Respuesta(200, "Datos de bodegas obtenidos correctamente", $bodegas);
        echo $respuesta->json();
    }
}
