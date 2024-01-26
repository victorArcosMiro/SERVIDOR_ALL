<?php
include_once "db.php";
include_once "model.php";

class Gamas extends Model{
    public function __construct()
    {
        parent::__construct("gamas");
    }
}
?>