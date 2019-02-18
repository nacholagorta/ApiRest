<?php
include_once 'Vuelos.php';
class ApiVuelos{
    function getAll(){
        $vuelo = new Vuelo();
        $vuelos = array();
        $vuelos["items"] = array();
        $res = $vuelo->obtenerVuelos();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){

                $item=array(
                    "idVuelo" => $row['idVuelo'],
                    "diayhora" => $row['diayhora'],
                    "origen" => $row['origen'],
                    "destino" => $row['destino'],
                    "precio" => $row['precio'],
                    "plazas_totales" => $row['plazas_totales'],
                    "plazas_libres" => $row['plazas_libres']
                );
                array_push($vuelos["items"], $item);
            }

            echo json_encode($vuelos);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}
?>