<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of consultas
 *
 * @author aramirez84
 */
class Consultas extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_zona()
    {
        $queryZonas=  $this->db->get('zona');
        if($queryZonas->num_rows()!=0)
         {
            foreach($queryZonas->result_array() as $row)
            {
                $nombreZonas[]=$row;                
            }
            return $nombreZonas;
         }
    }
    
    function get_deleg_mun()
    {
        $queryDelegacion = $this->db->get('deleg_mun');
        if($queryDelegacion->num_rows()!=0)
         {
            foreach($queryDelegacion->result_array() as $row)
            {
                $Delegacion[]=$row;                
            }
            return $Delegacion;
         }
    }
    
    function get_tipo_dano()
    {
        $queryTipo_dano=  $this->db->get('tipo_dano');
        if($queryTipo_dano->num_rows()!=0)
         {
            foreach($queryTipo_dano->result_array() as $row)
            {
                $TipoDano[]=$row;                
            }
            return $TipoDano;
         }
    }
    
    function get_nivel_dano()
    {
        $queryNivel_dano=  $this->db->get('nivel_dano');
        if($queryNivel_dano->num_rows()!=0)
         {
            foreach($queryNivel_dano->result_array() as $row)
            {
                $NivelDano[]=$row;                
            }
            return $NivelDano;
         }
    }
}
/* End of file consultas.php */
/* Location: ./application/models/consultas.php */