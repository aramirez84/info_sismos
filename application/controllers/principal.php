<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('xml');
        $this->load->model('Consultas');
    }

    public function index(){
        $this->load->view('header');
        $data['zonas'] =  $this->Consultas->get_zona();
        $data['delegacion'] = $this->Consultas->get_deleg_mun();
        $data['nivelDano'] = $this->Consultas->get_nivel_dano();
        $data['tipoHabitacion'] = $this->Consultas->get_tipo_habitación();
        $this->load->view('menu');
        $this->load->view('view_home',$data);
        $this->load->view('footer');
    }
    
    public function carga_info(){
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('subir_archivo');
        $this->load->view('footer');
    }
    
    public function procesar_archivo(){
        if(isset($_FILES) && !empty($_FILES))
        {
            $nombreArchivo = $_FILES['sel_file']['name'];
            $extArchivo = explode(".",$nombreArchivo);
            if(strtolower(end($extArchivo)) == "csv")
            {
                $datos=$this->validaDatos($_FILES);
                $insertar=$this->Consultas->insertarVivienda($datos);
                if($insertar!=0)
                {
                    $data['mensaje']="Registro(s), agregado(s) correctamente";
                    $data['class']="alert alert-success";
                }
                else
                {
                    $data['mensaje']="Ocurrio un error favor de intentar de nuevo";
                    $data['class']="alert alert-danger";
                }
            }
            else
            {
                $data['mensaje']="Extención de archivo no válida";
                $data['class']="alert alert-warning";
            }            
        }
        else
        {
            $data['mensaje']="Error al cargar el archivo, intentelo de nuevo";
            $data['class']="alert alert-danger";
        }
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('subir_archivo',$data);
        $this->load->view('footer');
    }
    
    public function validaDatos($file){
        $header = NULL;
        $data = array();
        $archivo = $file['sel_file']['tmp_name'];
        $handle = fopen($archivo, "r");
        while (($datos = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
            if(!$header)
            {
                $header = $datos;
            }
            else
            {
                $data[] = array_combine($header, $datos);
            }
        }
        fclose($handle);
        return $data;        
    }
    
    public function busca_info(){
        $valor=  $this->input->post('valor');
        $opcion=  $this->input->post('opcion');
        switch ($opcion) {
            case 'habitacion':
                $habitaciones = $this->Consultas->busca_habitaciones($valor);
                $xml_data=$this->crear_xml($habitaciones);
                break;
            case 'nivel':
                $niveles = $this->Consultas->busca_nivel($valor);
                $xml_data=$this->crear_xml($niveles);
                break;
            case 'delegacion':
                $delegaciones = $this->Consultas->busca_delegacion($valor);
                $xml_data=$this->crear_xml($delegaciones);
                break;
            case 'zona':
                $zonas = $this->Consultas->busca_zonas($valor);
                $xml_data=$this->crear_xml($zonas);
                break;
            case 'busca':
                $dano = $this->Consultas->busca_dano($valor);
                $xml_data=$this->crear_xml($dano);
            default:
                break;
        }
        echo $xml_data;
    }
    
    public function crear_xml($data){
        if(!is_null($data))
        {
            $dom= new DOMDocument('1.0', 'utf-8'); 
            $node = $dom->createElement('markers');
            $parnode=$dom->appendChild($node);
            header("Content-type: text/xml");
            foreach ($data as $key => $value)
            {
                $node = $dom->createElement('marker');
                $newnode = $parnode->appendChild($node);
                $newnode->setAttribute('id', $value['idVivienda']);
                $newnode->setAttribute('name', $value['nombre']); 
                $newnode->setAttribute('address', $value['direccion']); 
                $newnode->setAttribute('lat', $value['latitud']); 
                $newnode->setAttribute('lng', $value['longuitud']);
                $newnode->setAttribute('type', $value['tipo']); 
                $newnode->setAttribute('type_trade', $value['tipo_comercio']); 
            }
            return $dom->saveXML();            
        }
    }
    public function graficas(){
        $this->load->view('header');
        //$data['zonas'] =  $this->Consultas->get_zona();
        //$data['delegacion'] = $this->Consultas->get_deleg_mun();
        //$data['nivelDano'] = $this->Consultas->get_nivel_dano();
        //$data['tipoHabitacion'] = $this->Consultas->get_tipo_habitación();
        $this->load->view('menu');
        $this->load->view('panel');
        $this->load->view('panel2');
        $this->load->view('footer');
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */