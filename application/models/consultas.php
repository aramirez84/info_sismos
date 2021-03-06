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
    
    function get_tipo_habitación()
    {
        $this->db->select('idVivienda,tipo');
        $this->db->group_by('tipo');
        $queryTipo_habitacion= $this->db->get('vivienda');
        if($queryTipo_habitacion->num_rows()!=0)
         {
            foreach($queryTipo_habitacion->result_array() as $row)
            {
                $TipoHabitacion[]=$row;                
            }
            return $TipoHabitacion;
         }
    }
    
    /*###########################################################################
     * Metodos para insertar registros en la base de datos
     */
    public function insertarVivienda($data)
    {
        $this->db->insert_batch('vivienda', $data);
        $vivineda_agregada=  $this->db->affected_rows();
        return $vivineda_agregada;
    }
    /* ###############################################################################
     * Metodos para buscar en la base de datos
     */
    public function busca_habitaciones($tipo_habitacion)
    {
        $this->db->where('tipo',$tipo_habitacion);
        $query_habitaciones= $this->db->get('vivienda');
        if($query_habitaciones->num_rows()!=0)
         {
            foreach($query_habitaciones->result_array() as $row)
            {
                $DanoHabitacion[]=$row;                
            }
            return $DanoHabitacion;
         }
        
    }
    public function busca_nivel($nivel)
    {
        $this->db->select('*');
        $this->db->from('vivienda');
        $this->db->where('Nivel_dano_idNivel_dano',$nivel);
        $this->db->join('nivel_dano', 'nivel_dano.idNivel_dano = vivienda.Nivel_dano_idNivel_dano');
        $query_nivel=  $this->db->get();
        if($query_nivel->num_rows()!=0)
        {
            foreach ($query_nivel->result_array() as $row)
            {
                $NivelDano[]=$row;
            }
            return $NivelDano;
        }
    }
    
    public function busca_delegacion($delegacion)
    {
        $this->db->select('*');
        $this->db->from('vivienda');
        $this->db->where('Delegacion_idDelegacion',$delegacion);
        $this->db->join('deleg_mun', 'deleg_mun.idDelegacion = vivienda.Delegacion_idDelegacion');
        $query_delegacion=  $this->db->get();
        if($query_delegacion->num_rows()!=0)
        {
            foreach ($query_delegacion->result_array() as $row)
            {
                $danoDelegacion[]=$row;
            }
            return $danoDelegacion;
        }
    }
    public function busca_zonas($zona)
    {
        $this->db->select('*');
        $this->db->from('deleg_mun');
        $this->db->where('zona_idZona',$zona);
        $this->db->join('zona', 'zona.idZona = deleg_mun.zona_idZona');
        $this->db->join('vivienda', 'deleg_mun.idDelegacion = vivienda.Delegacion_idDelegacion');
        $query_zonas=  $this->db->get();
        if($query_zonas->num_rows()!=0)
        {
            foreach ($query_zonas->result_array() as $row)
            {
                $danoZonas[]=$row;
            }
            return $danoZonas;
        }
    }
    public function busca_dano($palabra)
    {
        $this->db->select('*');
        $this->db->from('vivienda');
        $this->db->like('nombre',$palabra);
        $this->db->or_like('direccion',$palabra);
        $this->db->or_like('tipo_comercio',$palabra);
        $this->db->or_like('descripcon',$palabra);
        $query_zonas=  $this->db->get();
        if($query_zonas->num_rows()!=0)
        {
            foreach ($query_zonas->result_array() as $row)
            {
                $danoZonas[]=$row;
            }
            return $danoZonas;
        }
    }
    public function dano_zonas()
    {
        $this->db->select('count(*) as total, s.nombre');
        $this->db->from('zona s');
        $this->db->join('deleg_mun m','s.idZona=m.zona_idZona');
        $this->db->join('vivienda v', 'm.idDelegacion=v.Delegacion_idDelegacion');
        $this->db->group_by("s.nombre"); 
        $dano_zona=  $this->db->get();
        if($dano_zona->num_rows()!=0)
        {
            foreach ($dano_zona->result_array() as $row)
            {
                $dano[]= $row;
            }
            return $dano;
        }
    }
    
    public function dano_delegacion()
    {
        $this->db->select('count(*) as total, m.nombre_delegacion');
        $this->db->from('zona s');
        $this->db->join('deleg_mun m','s.idZona=m.zona_idZona');
        $this->db->join('vivienda v', 'm.idDelegacion=v.Delegacion_idDelegacion');
        $this->db->group_by("m.nombre_delegacion"); 
        $dano_deleg=  $this->db->get();
        if($dano_deleg->num_rows()!=0)
        {
            foreach ($dano_deleg->result_array() as $row)
            {
                $dano[]= $row;
            }
            return $dano;
        }
    }
    public function dano_tipo()
    {
        $this->db->select('tipo_dano, count(tipo_dano) as total');
        $this->db->from('vivienda v');
        $this->db->join('nivel_dano n','v.Nivel_dano_idNivel_dano=n.idNivel_dano');
        $this->db->join('tipo_dano t', 'v.Tipo_dano_idTipo_dano=t.idTipo_dano');
        $this->db->group_by("tipo_dano"); 
        $dano_tipo=  $this->db->get();
        if($dano_tipo->num_rows()!=0)
        {
            foreach ($dano_tipo->result_array() as $row)
            {
                $dano[]= $row;
            }
            return $dano;
        }
    }
    public function dano_nivel()
    {
        $this->db->select('nombre_dano, count(nombre_dano) as total');
        $this->db->from('vivienda v');
        $this->db->join('nivel_dano n','v.Nivel_dano_idNivel_dano=n.idNivel_dano');
        $this->db->join('tipo_dano t', 'v.Tipo_dano_idTipo_dano=t.idTipo_dano');
        $this->db->group_by("nombre_dano"); 
        $dano_nivel=  $this->db->get();
        if($dano_nivel->num_rows()!=0)
        {
            foreach ($dano_nivel->result_array() as $row)
            {
                $dano[]= $row;
            }
            return $dano;
        }
    }
    public function dano_tipo_habitacion()
    {
        $this->db->select('tipo_comercio, count(tipo_comercio) as total');
        $this->db->from('vivienda v');
        $this->db->group_by("tipo_comercio"); 
        $dano_tipo_comercio=  $this->db->get();
        if($dano_tipo_comercio->num_rows()!=0)
        {
            foreach ($dano_tipo_comercio->result_array() as $row)
            {
                $dano[]= $row;
            }
            return $dano;
        }
    }
}
/* End of file consultas.php */
/* Location: ./application/models/consultas.php */