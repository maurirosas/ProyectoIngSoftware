<?php

class Mdl_bienvenida extends CI_MODEL
{
    function __construct()
    {
        parent ::__construct();
    }    

    function insertar_persona($parametros)
    {
        $campos= array(
            'nombres'=> $parametros['cnombre'],
            'apellidop'=> $parametros['capellidop'],
            'apellidom'=> $parametros['capellidom']
        );
        $this->db->insert('persona',$campos);     
    }

    function obtener_persona_all()
    {
        $consulta="Select * from persona;";
        $resultado= $this->db->query($consulta);
        return $resultado->result_array();
    }




}
