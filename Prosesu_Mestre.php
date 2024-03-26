<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelMestre;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Prosesu_Mestre extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model_mestre;
    protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $model = new ModelMestre();
        // $data['t_prof']  = $model->getMestre()->getResult();
        // $data['t_estatutu'] = $model->getEstatuto()->getResult();       
        $data['page_title'] = "Prosesu_Mestre";
        $data ['v_valor']= $model->findAll(); 
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/prosesu/view_prosesu_mestre',$data);
        echo view('layout/v_footer');
    }
    public function detail($id)
    {
        $model = new ModelEstudante();
        // $data['t_prof'] = $model->find($id); 
        // $data['t_estatutu'] = $model->getEstatuto()->getResult();  
        $data ['v_prof']= $model->findAll();	
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/detailmestre', $data);
        echo view('layout/v_footer');
    }

  
    
}