<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Consultas');
    }

    public function index()
    {
        $this->load->view('header');
        $data['zonas']=  $this->Consultas->get_zona();
        $this->load->view('menu');
        $this->load->view('view_home',$data);
        $this->load->view('footer');
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */