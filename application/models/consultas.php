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
        $query=  $this->db->get('zona');
        return $query->result();
    }
}
/* End of file consultas.php */
/* Location: ./application/models/consultas.php */