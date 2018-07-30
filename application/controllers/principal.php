<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('xml');
        $this->load->model('Consultas');
    }

    public function index()
    {
        $this->load->view('header');
        $data['zonas'] =  $this->Consultas->get_zona();
        $data['delegacion'] = $this->Consultas->get_deleg_mun();
        $data['nivelDano'] = $this->Consultas->get_nivel_dano();
        $data['tipoHabitacion'] = $this->Consultas->get_tipo_habitación();
        $this->load->view('menu');
        $this->load->view('view_home',$data);
        $this->load->view('footer');
    }
    
    public function carga_info()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('subir_archivo');
        $this->load->view('footer');
    }
    
    public function procesar_archivo()
    {
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
        //$data['mensaje']="";
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('subir_archivo',$data);
        $this->load->view('footer');
    }
    
    public function validaDatos($file)
    {
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
    
    public function busca_info()
    {
        $valor=  $this->input->post('valor');
        $opcion=  $this->input->post('opcion');
        switch ($opcion) {
            case 'habitacion':
                $habitaciones = $this->Consultas->busca_habitaciones($valor);
                $this->crear_xml($habitaciones);
                break;
            case 'nivel':
                break;
            case 'delegacion':
                break;
            case 'zona':
                break;
            default:
                break;
        }
    }
    
    public function crear_xml($data)
    {
        var_dump($data);
        $filePath = 'datos.xml';
        $dom     = new DOMDocument('1.0', 'utf-8'); 
        $root      = $dom->createElement('markers'); 
        foreach ($data as $key => $value)
        {
            echo $key;
            echo $value['idVivienda'];
            $id=$value['idVivienda'];  
            $nombre=$value['nombre']; 
            $direccion=$value['direccion']; 
            $latitud=$value['latitud']; 
            $longitud=$value['longuitud']; 
            $tipo=$value['tipo'];
            $tipo_comercio=$value['tipo_comercio'];
            $book = $dom->createElement('marker');
            $book->setAttribute('id', $id);
            $name=$dom->createElement('name', $nombre); 
            $book->appendChild($name); 
            $author   = $dom->createElement('author', $bookAuthor); 
            $book->appendChild($author); 
            $price    = $dom->createElement('price', $bookPrice); 
            $book->appendChild($price); 
            $isbn     = $dom->createElement('ISBN', $bookISBN); 
            $book->appendChild($isbn); 
            $category = $dom->createElement('category', $bookCategory); 
            $book->appendChild($category);
            $root->appendChild($book);
        }
        $dom->appendChild($root); 
        $dom->save($filePath); 
        return $xmlfile;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */