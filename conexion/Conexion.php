
<?php

class Conexion {

    private $conexion;
    private $configuracion = [

        "driver" => "pgsql",
        "host" => "localhost",
        "database" => "desisdb",
        "port" => "5432",
        "username"=> "postgres",
        "password"=> "123456",
        "charset" => "UTF8"
    ];

    public function __construct() {
       
    }
    
    public function conectar(){
        try{
            $CONTROLADOR = $this->configuracion["driver"];
            $SERVIDOR = $this->configuracion["host"];
            $BASE_DATOS = $this->configuracion["database"];
            $PUERTO = $this->configuracion["port"];
            $USUARIO = $this->configuracion["username"];
            $CLAVE = $this->configuracion["password"];
            $CODIFICACION = $this->configuracion["charset"];

            
            $url = "{$CONTROLADOR}:host={$SERVIDOR};port={$PUERTO};dbname={$BASE_DATOS}";
            $this->conexion =  new PDO($url,$USUARIO,$CLAVE);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
            echo "Conexión exitosa a PostgreSQL!";
        }catch(PDOException $ex){

            echo "Error de conexión: " . $ex->getMessage();
            
        }
    }




}