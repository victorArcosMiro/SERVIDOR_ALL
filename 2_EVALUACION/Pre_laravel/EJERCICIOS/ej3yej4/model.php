<?php

include_once "db.php";

class Model
{
    protected $table;  // Aquí guardaremos el nombre de la tabla a la que estamos accediendo
    protected $db;       // Y aquí la capa de abstracción de datos

    public function __construct($tableName)
    {
        $this->table = $tableName;
        $this->db    = new Db();
        $this->db->createConnection('localhost', 'jardinero', 'jardinero', 'jardineria');
    }

    public function getAll()
    {
        $list = $this->db->dataQuery("SELECT * FROM " . $this->table);
        return $list;
    }

    public function get($id)
    {
        $record = $this->db->dataQuery("SELECT * FROM " . $this->table . " WHERE id = " . $id);
        return $record;
    }
    public function getCodigoCliente($id)
    {
        $record = $this->db->dataQuery("SELECT * FROM " . $this->table . " WHERE CodigoCliente = " . $id);
        return $record;
    }

    public function delete($id)
    {
        $result = $this->db->dataQuery("DELETE FROM " . $this->table . " WHERE id = " . $id);
        return $result;
    }

}
