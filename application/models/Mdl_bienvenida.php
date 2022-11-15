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
        echo $parametros['cnombre'];
        $this->db->insert('persona',$campos);     
    }

    function modificar_persona($parametros)
    {
        $id =$parametros['cid'];
        $campos= array(
            'nombres'=> $parametros['cnombre'],
            'apellidop'=> $parametros['capellidop'],
            'apellidom'=> $parametros['capellidom']
        );
        
        $this->db->where('id', $id);
        $this->db->update('persona', $campos);

    }


    function obtener_persona_all()
    {
        $consulta="Select * from persona;";
        $resultado= $this->db->query($consulta);
        return $resultado->result_array();
    }

    function obtener_persona_by($parametros)
    {
        
        if($parametros['cnombre']==''){
            if($parametros['capellidop']==''){
                $consulta="Select * from persona where apellidom like '%" .$parametros['capellidom']. "%';";
            }else{
                $consulta="Select * from persona where apellidop like '%" .$parametros['capellidop']. "%';";
            }    
        }else{
            $consulta="Select * from persona where nombres like '%" .$parametros['cnombre']. "%';";
        }
        
        if($parametros['cnombre']==''){
            $consulta="Select * from persona where apellidop like '%" .$parametros['capellidop']. "%' AND apellidom like '%" .$parametros['capellidom']. "%';";
            
        }else{
            if($parametros['capellidop']==''){
                $consulta="Select * from persona where nombres like '%" .$parametros['cnombre']. "%' AND apellidom like '%" .$parametros['capellidom']. "%';";
            }else{
                $consulta="Select * from persona where nombres like '%" .$parametros['cnombre']. "%' AND apellidop like '%" .$parametros['capellidop']. "%';";
            }
        }
        
        
        $consulta="Select * from persona where nombres like '%" .$parametros['cnombre']. "%' AND apellidom like '%" .$parametros['capellidom']. "%' AND apellidop like '%" .$parametros['capellidop']. "%';";

        $resultado= $this->db->query($consulta);
        return $resultado->result_array();
    }


    function eliminar_persona($id)
    {
        
        $consulta="Delete from persona where id= '".$id."';" ;
        $this->db->query($consulta);
        
    }



}
