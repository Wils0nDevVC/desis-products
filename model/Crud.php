
<?php
require_once './conexion/Conexion.php';

class Crud
{

    protected $tabla;
    protected $conexion;
    protected $params = [];
    protected $sql = null;

    public function __construct($tabla = null, $params = [])
    {

        $this->conexion = (new Conexion())->conectar();
        $this->tabla = $tabla;
        $this->params = $params;
    }

    protected function buildSelectQuery($filters = [])
    {
        $this->sql = "SELECT * FROM {$this->tabla}";
        $this->params = [];  
        if (!empty($filters)) {
            $whereClauses = [];
            foreach ($filters as $column => $value) {
                $whereClauses[] = "$column = ?";  
                $this->params[] = $value;  
            }
            $this->sql .= " WHERE " . implode(' AND ', $whereClauses);
        }
    }



    protected function applyPagination($limit, $page)
    {
        $offset = ($page - 1) * $limit;  
        $this->sql .= " LIMIT ? OFFSET ?"; 
        $this->params[] = $limit;  
        $this->params[] = $offset; 
    }

   
    public function findAll($filters = [], ?int $limit = null, int $page = 1) : array | null
    {
        try{
        
       $this->buildSelectQuery($filters);

       if ($limit  !== null) { 
            $this->applyPagination($limit, $page);
        }

        $sth = $this->conexion->prepare($this->sql);
        $sth->execute($this->params);
        return $sth->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $ex){
            echo $ex->getMessage();
            return null;
        }
    }

    protected function buildInsertQuery($data)
    {
        $columns = implode(", ", array_keys($data));  
        $placeholders = implode(", ", array_fill(0, count($data), "?"));  
        $this->sql = "INSERT INTO {$this->tabla} ($columns) VALUES ($placeholders)";
        $this->params = array_values($data);  
        
    }


    public function save($data): int | null
    {
        try {
            $this->buildInsertQuery($data);  
            $sth = $this->conexion->prepare($this->sql);
            $sth->execute($this->params); 
            return  $this->conexion->lastInsertId();

        } catch (Exception $exc) {
            echo $exc->getMessage();
            return null;
        }
    }

    public function saveTransaction($data): void
    {
        try {
            $this->buildInsertQuery($data);  
            $sth = $this->conexion->prepare($this->sql);
            $sth->execute($this->params); 

        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
