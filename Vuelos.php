<?php
include_once 'DB.php';
class Vuelo extends DB{

    function obtenerVuelos(){
        $query = $this->connect()->query('SELECT * FROM vuelos');
        return $query;
    }
}
?>
